<?php

namespace App\View\Components\News;

use App\Constants\Constants;
use App\Models\Tag;
use Illuminate\View\Component;

class Tags extends Component
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
        return view('components.news.tags', [
            'tags' => Tag::orderByRaw("ISNULL(sort_order), sort_order ASC, id DESC")->get()
        ]);
    }
}
