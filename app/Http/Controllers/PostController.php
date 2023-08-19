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
        if (request()->hasAny(['category', 'tag', 'search'])) {
            // Translate query string into appropriate name
            $parameters = ['category', 'tag', 'search'];
            $parameterStrings = [];

            foreach ($parameters as $param) {
                if (request()->has($param)) {
                    $parameterStrings[] = $param . ' = ' . $this->getDatabaseValue($param, request()->input($param));
                }
            }

            $parameterString = implode(', ', $parameterStrings);

            // Translate tag name into its id
            $translatedRequest = request(['search', 'category']);
            $translatedRequest['tag'] = Tag::where('name', request('tag'))->value('id');

            return view('news.posts.search', [
                'posts' => Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                                ->filter($translatedRequest)
                                ->where('status', Constants::PUBLISHED)
                                ->where('published_at', '<=', now())
                                ->paginate(14)
                                ->withQueryString(),
                'indicator' => $parameterString
            ]);
        } else if(request()->has(['popular'])) {

            return view('news.posts.search', [
                'posts' => Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                                ->popular()
                                ->paginate(14)
                                ->withQueryString(),
                'indicator' => 'all of the popular posts'
            ]);
        } else if (request()->has(['lastest'])) {

            return view('news.posts.search', [
                'posts' => Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                                ->latest()
                                ->paginate(14)
                                ->withQueryString(),
                'indicator' => 'all of the lastest posts'
            ]);
        } else if (request()->has(['featured'])) {

            return view('news.posts.search', [
                'posts' => Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                                ->featured()
                                ->paginate(14)
                                ->withQueryString(),
                'indicator' => 'all of the featured posts'
            ]);
        } else {

            return view('news.posts.index', [
                'categories' => Category::with(['posts' => fn ($query) => $query->where('status', Constants::PUBLISHED)
                                                                                ->where('published_at', '<=', now())
                                                                                ->orderByDesc('published_at')
                                                                                ->take(5)])
                                        ->where('status', Constants::ACTIVE)
                                        ->whereNull('parent_id')
                                        ->get(),
                'popularPosts' => Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                                        ->popular()
                                        ->get(),
                'lastestPosts' => Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                                        ->latest()
                                        ->get(),
                'featuredPosts' =>  Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                                        ->featured()
                                        ->get(),
            ]);
        }
    }

    public function show(Post $post)
    {
        $tagIds = explode(',', $post->tag_ids);
        $tagNames = Tag::whereIn('id', $tagIds)->pluck('name')->toArray();

        return view('news.posts.show', [
            'post' => $post->load(['category' => function ($query) {
                $query->where('status', Constants::PUBLISHED);
            }]),
            'tagNames' => $tagNames
        ]);
    }

    private function getDatabaseValue($param, $paramValue)
    {
        if ($param == 'category') {
            return Category::where('slug', $paramValue)->value('name');
        } else {
            return $paramValue;
        }
    }
}
