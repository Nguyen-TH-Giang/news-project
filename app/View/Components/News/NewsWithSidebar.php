<?php

namespace App\View\Components\News;

use App\Constants\Constants;
use App\Models\General;
use App\Models\Post;
use Illuminate\View\Component;

class NewsWithSidebar extends Component
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
        return view('components.news.news-with-sidebar', [
            'generals' => General::first(),
            'posts' => Post::with('category')->where('trending', Constants::TRENDY)
                                            ->where('status', Constants::PUBLISHED)
                                            ->where('published_at', '<=', now())
                                            ->orderBy('published_at', 'desc')
                                            ->get()
        ]);
    }
}
