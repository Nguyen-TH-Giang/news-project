<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\BannerAds;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class BannerAdsController extends Controller
{
    public function index()
    {
        $banners = BannerAds::paginate(10);

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
            'image_url' => ['required', 'image'],
            'type' => ['required', 'in:' . Constants::BANNER_TOP . ',' . Constants::BANNER_SIDE . ',' . Constants::BANNER_CENTER],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'status' => ['in:' . Constants::ACTIVE . ',' . Constants::INACTIVE]
        ]);

        if (request('status') == Constants::ACTIVE) {
            $attributes['status'] = request('status');
        }

        $attributes['image_url'] = request()->file('image_url')->store('banners');
        $attributes['published_at'] = $attributes['date'] . ' ' . $attributes['time'];
        $attributes = Arr::except($attributes, array('date', 'time'));

        BannerAds::create($attributes);

        return redirect()->route('admin.banners.index');
    }

    public function edit(BannerAds $bannerAds)
    {
        $banners = BannerAds::all();

        foreach ($banners as $banner) {
            $dateAndTime = explode(' ', $banner->published_at);
        }

        $bannerAds['date'] = $dateAndTime[0];
        $bannerAds['time'] = $dateAndTime[1];

        return view('admin.banners.edit', [
            'banner' => $bannerAds
        ]);
    }

    protected function validateBanner()
    {
    }
}
