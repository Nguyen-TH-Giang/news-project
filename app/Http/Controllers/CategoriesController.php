<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Category;
use App\Models\Post;
use App\Rules\QualifiedParent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->filterName(request(['search']))->paginate(10)->withQueryString();

        foreach ($categories as $category) {
            if ($category['status'] == Constants::INACTIVE) {
                $category['status'] = 'Inactive';
            } else if ($category['status'] == Constants::ACTIVE) {
                $category['status'] = 'Active';
            }
        }

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.create', [
            'categories' => Category::where('status', Constants::ACTIVE)
                            ->whereNull('deleted_at')
                            ->whereNull('parent_id')
                            ->orderByRaw("ISNULL(sort_order), sort_order ASC, id DESC")
                            ->get()
        ]);
    }

    public function store()
    {
        $id = Category::orderBy('id', 'desc')->value('id') + 1;

        $attributes = $this->validateCategory($id);

        $attributes['image_url'] = request()->file('image_url')->store('categories');

        if ($attributes['image_url'] !== false) {
            $this->cutImage($attributes['image_url']);
        }

        if ($attributes['parent_id'] == Constants::EMPTY_VALUE){
            $attributes['parent_id'] = null;
        }

        $attributes['name'] = $attributes['title'];
        $attributes = Arr::except($attributes, array('title'));
        Category::create($attributes);

        return redirect()->route('admin.categories.index')->with('success', 'Category created !');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => Category::where('status', Constants::ACTIVE)
                                    ->whereNull('deleted_at')
                                    ->whereNull('parent_id')
                                    ->orderByRaw("ISNULL(sort_order), sort_order ASC, id DESC")
                                    ->get()
        ]);
    }

    public function update(Category $category)
    {
        $attributes = $this->validateCategory($category->id, $category);

        if (isset($attributes['image_url'])) {
            $attributes['image_url'] = request()->file('image_url')->store('categories');

            if ($attributes['image_url'] !== false) {
                $this->cutImage($attributes['image_url']);
            }
        }

        if ($attributes['parent_id'] == Constants::EMPTY_VALUE){
            $attributes['parent_id'] = null;
        }

        $attributes['name'] = $attributes['title'];
        $attributes = Arr::except($attributes, array('title'));
        $category->update($attributes);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated !');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted !');
    }

    protected function validateCategory($id, ?Category $category = null): array
    {
        $category ??= new Category();

        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category)],
            'parent_id' => ['nullable', 'integer', new QualifiedParent($id)],
            'image_url' => $category->exists ? ['image', 'max:1024'] : ['required', 'image', 'max:1024'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['in:' . Constants::ACTIVE . ',' . Constants::INACTIVE]
        ]);
    }

    public function cutImage($url)
    {
        try {
            $imageResize = Image::make(public_path('storage/' . $url));
            $imageResize->fit(Constants::CATEGORY_WIDTH, Constants::CATEGORY_HEIGHT);
            $imageResize->save(public_path('storage/' . $url));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'image_url' => 'File could not be stored !'
            ]);
        }
    }
}
