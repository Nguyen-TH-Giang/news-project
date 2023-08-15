<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('news.posts.index', [
            'categories' => Category::with(['posts' => function ($query) {
                                                        $query->where('status', Constants::ACTIVE)
                                                            ->where('published_at', '<=', now())
                                                            ->orderBy('published_at', 'desc');
                                                    }])
                                ->where('status', Constants::ACTIVE)
                                ->paginate(4),
            'popularPosts' => Post::with(['category'=> fn ($query) => $query->where('status', Constants::ACTIVE) ])
                                    ->where('status', Constants::ACTIVE)
                                    ->where('featured', Constants::NOT_FEATURED)
                                    ->where('published_at', '<=', now())
                                    ->orderBy('view_count', 'desc')->get(),
            'lastestPosts' => Post::with(['category'=> fn ($query) => $query->where('status', Constants::ACTIVE) ])
                                    ->where('status', Constants::ACTIVE)
                                    ->where('featured', Constants::NOT_FEATURED)
                                    ->where('published_at', '<=', now())
                                    ->orderBy('published_at', 'desc')->get(),
            'featuredPosts' =>  Post::with(['category'=> fn ($query) => $query->where('status', Constants::ACTIVE) ])
                                    ->where('status', Constants::ACTIVE)
                                    ->where('featured', Constants::FEATURED)
                                    ->where('published_at', '<=', now())
                                    ->orderBy('published_at', 'desc')->get(),
        ]);
    }

    public function show(Post $post)
    {
        $tagIds = explode(',', $post->tag_ids);
        $tagNames = Tag::whereIn('id', $tagIds)->pluck('name')->toArray();

        return view('news.posts.show',[
            'post' => $post->load(['category' => function ($query) {
                $query->where('status', Constants::ACTIVE);
            }]),
            'tagNames' => $tagNames
        ]);
    }
}
