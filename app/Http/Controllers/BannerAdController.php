<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BannerAdController extends Controller
{
    public function index()
    {
        return view('admin.banners.index');
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'image' => ['required', 'image'],
            'type' => ['required', 'in:1,2,3'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
        ]);
    }

    protected function validateBanner()
    {

    }
}
