<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriptions;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('admin.newsletters.index', [
            'newsletters' => NewsletterSubscriptions::orderBy('id', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
        ]);

        NewsletterSubscriptions::create($attributes);
        return back()->with('success', 'Thanks for signing up !');
    }
}
