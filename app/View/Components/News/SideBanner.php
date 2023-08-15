<?php

namespace App\View\Components\News;

use App\Constants\Constants;
use App\Models\BannerAds;
use Illuminate\View\Component;

class SideBanner extends Component
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
        return view('components.news.side-banner', [
            'banner' => BannerAds::where('status', Constants::ACTIVE)
                                ->where('type', Constants::BANNER_SIDE)
                                ->where('published_at', '<=', now())
                                ->orderBy('published_at', 'desc')
                                ->first()
        ]);
    }
}
