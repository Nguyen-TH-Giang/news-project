<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'posts' => Post::orderByRaw("ISNULL(view_count), view_count DESC, id DESC")->take(5)->get()
        ]);
    }
}
