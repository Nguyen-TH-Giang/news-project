<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\BannerAds;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

class BannerAdsController extends Controller
{
    public function index()
    {
        $banners = BannerAds::orderBy('id', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString();

        foreach ($banners as $banner) {
            if ($banner['status'] == Constants::INACTIVE) {
                $banner['status'] = 'Inactive';
            } else if ($banner['status'] == Constants::ACTIVE) {
                $banner['status'] = 'Active';
            }

            if ($banner['type'] == Constants::BANNER_TOP) {
                $banner['type'] = 'Top';
            } else if ($banner['type'] == Constants::BANNER_SIDE) {
                $banner['type'] = 'Side';
            } else if ($banner['type'] == Constants::BANNER_CENTER) {
                $banner['type'] = 'Center';
            }
        }

        return view('admin.banners.index', [
            'banners' => $banners
        ]);
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'image_url' => ['required', 'image', 'max:1024'],
            'type' => ['required', 'in:' . Constants::BANNER_TOP . ',' . Constants::BANNER_SIDE . ',' . Constants::BANNER_CENTER],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:' . Constants::TIME_FORMAT],
            'status' => ['in:' . Constants::ACTIVE . ',' . Constants::INACTIVE]
        ]);

        $attributes['image_url'] = request()->file('image_url')->store('banners');
        $this->cutImage($attributes['image_url'], $attributes['type']);
        $attributes['published_at'] = $attributes['date'] . ' ' . $attributes['time'];
        $attributes = Arr::except($attributes, array('date', 'time'));

        BannerAds::create($attributes);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created !');
    }

    public function edit(BannerAds $bannerAds)
    {
        $dateAndTime = explode(' ', $bannerAds->published_at);
        $bannerAds['date'] = $dateAndTime[0];
        $bannerAds['time'] = $dateAndTime[1];

        return view('admin.banners.edit', [
            'banner' => $bannerAds
        ]);
    }

    public function update(BannerAds $bannerAds)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'image_url' => ['image', 'max:1024'],
            'type' => ['required', 'in:' . Constants::BANNER_TOP . ',' . Constants::BANNER_SIDE . ',' . Constants::BANNER_CENTER],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:' . Constants::TIME_FORMAT],
            'status' => ['in:' . Constants::ACTIVE . ',' . Constants::INACTIVE]
        ]);

        if (isset($attributes['image_url'])) {
            $attributes['image_url'] = request()->file('image_url')->store('banners');
            $this->cutImage($attributes['image_url'], $attributes['type']);
        }

        $attributes['published_at'] = $attributes['date'] . ' ' . $attributes['time'];
        $attributes = Arr::except($attributes, array('date', 'time'));
        $bannerAds->update($attributes);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated !');
    }

    public function destroy(BannerAds $bannerAds)
    {
        $bannerAds->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted !');
    }

    protected function cutImage($url, $type)
    {
        if ($url !== false) {
            if (($type == Constants::BANNER_TOP) || $type == Constants::BANNER_CENTER) {
                $imageResize = Image::make(public_path('storage/' . $url));
                $imageResize->fit(Constants::BANNER_TOP_WIDTH, Constants::BANNER_TOP_HEIGHT);
                $imageResize->save(public_path('storage/' . $url));

            } else if ($type == Constants::BANNER_SIDE) {
                $imageResize = Image::make(public_path('storage/' . $url));
                $imageResize->fit(Constants::BANNER_SIDE_WIDTH, Constants::BANNER_SIDE_HEIGHT);
                $imageResize->save(public_path('storage/' . $url));
            }
        } else {
            throw ValidationException::withMessages([
                'image_url' => 'File could not be stored !'
            ]);
        }
    }
}
