<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $generals = General::get();

        if ($generals->isEmpty())
        {
            return view('admin.generals.empty-table');
        } else {
            return view('admin.generals.edit', [
                'general' => General::first()
            ]);
        }
    }

    public function create()
    {
        return view('admin.generals.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'contact_name' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/^((0)\d{9})$|^(\+(84)\d{9})$/'],
            'address' => 'required',
            'description' => 'required',
            'logo' => ['required', 'image', 'max:1024'],
        ]);

        $attributes['logo'] = request()->file('logo')->store('logo');

        General::create($attributes);
        return redirect()->route('dashboard')->with('success', 'General information created!');
    }

    public function update(General $general)
    {
        request()->validate([
            'contact_name' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/^((0)\d{9})$|^(\+(84)\d{9})$/'],
            'address' => 'required',
            'description' => 'required',
            'logo' => ['image', 'max:1024'],
        ]);

        $attributes = request()->all();
        if (isset($attributes['logo'])) {
            $attributes['logo'] = request()->file('logo')->store('logo');
        }

        $general->update($attributes);
        return redirect()->route('dashboard')->with('success', 'General information updated!');

    }
}
