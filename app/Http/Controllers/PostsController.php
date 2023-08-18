<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Rules\AllowEmpty;
use App\Rules\CategoryExists;
use App\Rules\TagsExist;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString();

        foreach ($posts as $post) {
            if ($post['status'] == Constants::DRAFT) {
                $post['status'] = 'Draft';
            } else if ($post['status'] == Constants::PUBLISHED) {
                $post['status'] = 'Published';
            }

            if ($post['trending'] == Constants::NOT_TRENDY) {
                $post['trending'] = 'No';
            } else if ($post['trending'] == Constants::TRENDY) {
                $post['trending'] = 'Yes';
            }

            if ($post['featured'] == Constants::NOT_FEATURED) {
                $post['featured'] = 'No';
            } else if ($post['featured'] == Constants::FEATURED) {
                $post['featured'] = 'Yes';
            }
        }

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('admin.posts.create',[
            'categories' => Category::where('status', Constants::ACTIVE)
                                    ->whereNull('deleted_at')
                                    ->orderByRaw("ISNULL(sort_order), sort_order ASC, id DESC")
                                    ->get(),
            'tags' => Tag::orderBy('sort_order', 'desc')->get()
        ]);
    }

    public function store()
    {
        $attributes = $this->validatePost();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('posts');

        if ($attributes['thumbnail'] !== false) {
            $this->cutImage($attributes['thumbnail']);
        }

        if ($attributes['category_id'] == Constants::EMPTY_VALUE){
            $attributes['category_id'] = null;
        }

        $attributes['tag_ids'] = !empty($attributes['tag_ids']) ? implode(', ', $attributes['tag_ids']) : null;
        $attributes['published_at'] = $attributes['date'] . ' ' . $attributes['time'];
        $attributes = Arr::except($attributes, array('date', 'time'));

        Post::create($attributes);

        return redirect()->route('admin.posts.index')->with('success', 'Post created !');
    }

    public function edit(Post $post)
    {
        $post->tag_ids = explode(', ', $post->tag_ids);
        $dateAndTime = explode(' ', $post->published_at);
        $post['date'] = $dateAndTime[0];
        $post['time'] = $dateAndTime[1];

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::where('status', Constants::ACTIVE)
                                    ->whereNull('deleted_at')
                                    ->orderByRaw("ISNULL(sort_order), sort_order ASC, id DESC")
                                    ->get(),
            'tags' => Tag::orderBy('sort_order', 'desc')->get()
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('posts');

            if ($attributes['thumbnail'] !== false) {
                $this->cutImage($attributes['thumbnail']);
            }
        }

        if ($attributes['category_id'] == Constants::EMPTY_VALUE){
            $attributes['category_id'] = null;
        }

        $attributes['tag_ids'] = !empty($attributes['tag_ids']) ? implode(', ', $attributes['tag_ids']) : null;
        $attributes['published_at'] = $attributes['date'] . ' ' . $attributes['time'];
        $attributes = Arr::except($attributes, array('date', 'time'));

        $post->update($attributes);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated !');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted !');
    }

    public function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'category_id' => new CategoryExists,
            'tag_ids' => ['sometimes', 'array', new TagsExist],
            'thumbnail' => $post->exists ? ['image', 'max:1024'] : ['required', 'image', 'max:1024'],
            'status' => ['required', 'in:' . Constants::DRAFT . ',' . Constants::PUBLISHED],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:' . Constants::TIME_FORMAT],
            'featured' => ['in:' . Constants::NOT_FEATURED . ',' . Constants::FEATURED],
            'trending' => ['in:' . Constants::NOT_TRENDY . ',' . Constants::TRENDY],
            'description' => 'required',
            'content' => 'required',
        ], ['slug.unique' => 'The provided slug is already in use.']);
    }

    public function cutImage($url)
    {
        try {
            $imageResize = Image::make(public_path('storage/' . $url));
            $imageResize->fit(Constants::POST_WIDTH, Constants::POST_HEIGHT);
            $imageResize->save(public_path('storage/' . $url));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'thumbnail' => 'File could not be stored !'
            ]);
        }
    }
}
