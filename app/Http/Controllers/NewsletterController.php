<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriptions;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('admin.newsletters.index', [
            'newsletters' => NewsletterSubscriptions::orderBy('id', 'DESC')->paginate(10)
        ]);
    }
}
