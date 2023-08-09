<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Category;
use Illuminate\Http\Request;

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
            'categories' => Category::orderBy('id', 'DESC')
        ]);
    }

}

