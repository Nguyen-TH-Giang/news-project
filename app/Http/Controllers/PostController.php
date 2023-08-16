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
                'params' => $parameterString
            ]);
        } else {
            return view('news.posts.index', [
                'categories' => Category::with(['posts' => function ($query) {
                    $query->where('status', Constants::ACTIVE)
                        ->where('published_at', '<=', now())
                        ->orderBy('published_at', 'desc');
                }])
                    ->where('status', Constants::PUBLISHED)
                    ->paginate(4),
                'popularPosts' => Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                    ->where('status', Constants::PUBLISHED)
                    ->where('featured', Constants::NOT_FEATURED)
                    ->where('published_at', '<=', now())
                    ->orderBy('view_count', 'desc')->get(),
                'lastestPosts' => Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                    ->where('status', Constants::PUBLISHED)
                    ->where('featured', Constants::NOT_FEATURED)
                    ->where('published_at', '<=', now())
                    ->orderBy('published_at', 'desc')->get(),
                'featuredPosts' =>  Post::with(['category' => fn ($query) => $query->where('status', Constants::ACTIVE)])
                    ->where('status', Constants::PUBLISHED)
                    ->where('featured', Constants::FEATURED)
                    ->where('published_at', '<=', now())
                    ->orderBy('published_at', 'desc')->get(),
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
        switch ($param) {
            case 'search':
                return Post::where('slug', $paramValue)->value('title');
            case 'category':
                return Category::where('slug', $paramValue)->value('name');
            default:
                return $paramValue;
        }
    }
}
