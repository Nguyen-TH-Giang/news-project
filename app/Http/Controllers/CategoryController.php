<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('news.categories.index', [
            'categories' => Category::with(['posts' => function ($query) {
                                                $query->where('status', Constants::ACTIVE)
                                                    ->where('published_at', '<=', now())
                                                    ->orderBy('published_at', 'desc');
                                            }])
                                                ->where('status', Constants::ACTIVE)
                                                ->paginate(2),
        ]);
    }
}
