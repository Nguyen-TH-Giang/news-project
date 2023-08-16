<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\General;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ContactController extends Controller
{
    public function index()
    {
        return view('news.contact', [
            'generals' => General::first()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'subject' => 'required',
            'message' => 'required',
        ]);
        $attributes['content'] = $attributes['message'];
        $attributes = Arr::except($attributes, array('message'));

        try {
            Contact::create($attributes);
            return response()->json(['success' => 'Thank you, your submission has been saved!']);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to create the contact.'], 500);
        }
    }
}
