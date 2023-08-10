<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Category;
use App\Rules\QualifiedParent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

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
            'categories' => Category::where('status', Constants::ACTIVE)->whereNull('deleted_at')->whereNull('parent_id')->orderBy('id', 'DESC')->get()
        ]);
    }

    public function store()
    {
        $id = Category::orderBy('id', 'desc')->value('id') + 1;

        $attributes = $this->validateCategory($id);

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
            'categories' => Category::where('status', Constants::ACTIVE)->whereNull('deleted_at')->whereNull('parent_id')->orderBy('id', 'DESC')->get()
        ]);
    }

    public function update(Category $category)
    {
        $attributes = $this->validateCategory($category->id);

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
        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($category)],
            'parent_id' => ['nullable', 'integer', new QualifiedParent($id)],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['in:' . Constants::ACTIVE . ',' . Constants::INACTIVE]
        ]);
    }
}
