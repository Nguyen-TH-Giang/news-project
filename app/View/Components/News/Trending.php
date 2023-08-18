<?php

namespace App\View\Components\News;

use App\Constants\Constants;
use App\Models\BannerAds;
use App\Models\Post;
use Illuminate\View\Component;

class Trending extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.news.trending', [
            'posts' => Post::where('trending', Constants::TRENDY)
                            ->where('status', Constants::PUBLISHED)
                            ->where('published_at', '<=', now())
                            ->orderBy('published_at', 'desc')
                            ->get(),
            'banner' => BannerAds::where('status', Constants::ACTIVE)
                        ->where('type', Constants::BANNER_CENTER)
                        ->where('published_at', '<=', now())
                        ->orderBy('published_at', 'desc')
                        ->first()
        ]);
    }
}
