<?php

namespace App\View\Components\News;

use App\Constants\Constants;
use App\Models\Category;
use Illuminate\View\Component;

class CategoryNavbar extends Component
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
        return view('components.news.category-navbar', [
            'categories' => Category::with(['categories' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                                    ->where('status', Constants::ACTIVE)
                                    ->whereNull('parent_id')->get(),
            'currentCategory' => Category::all()->firstWhere('slug', request('category'))
        ]);
    }
}
