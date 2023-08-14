<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tags.index', [
            'tags' => Tag::orderBy('id', 'DESC')->filter(request(['search']))->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'sort_order' => ['nullable', 'integer']
        ]);

        Tag::create($attributes);
        return redirect()->route('admin.tags.index')->with('success', 'Tag created!');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', [
            'tag' => $tag
        ]);
    }

    public function update(Tag $tag)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'sort_order' => ['nullable', 'integer']
        ]);

        $tag->update($attributes);
        return redirect()->route('admin.tags.index')->with('success', 'Tag updated!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag deleted!');
    }
}
