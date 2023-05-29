<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Services\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublisherController extends Controller
{
    const VALIDATION_RULE = [
        'name' => 'required',
        'name_ukr' => 'required',
        'image' => 'image|mimes:jpg,jpeg,png',
    ];
    //TODO change rules
    public function index()
    {
        $data['publishers'] = Publisher::all();
        return view('publisher.index', $data);
    }

    public function create()
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            return view('publisher.create');
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            $validatedData = $request->validate(self::VALIDATION_RULE);

            if ($request->file('image') != null) {
                $validatedData["image"] = ($request->image)->store("uploads/publishers");
            } else {
                $validatedData["image"] = "css/not_found_image.jpg";
            }
            $validatedData['slug']=Utility::slugify($validatedData['name']);
            Publisher::create($validatedData);

            return redirect()->route('publisher.index')->with('success', 'Publisher has been created successfully');
        }
        return redirect()->back();
    }

    public function show(Publisher $publisher)
    {
        $data['publisher'] = $publisher;
        $data['books'] = $data['publisher']->books;
        return view('book.index', $data);
    }

    public function edit(Publisher $publisher)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            return view('publisher.edit', compact('publisher'));
        }
        return redirect()->back();
    }

    public function update(Request $request, Publisher $publisher)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            $validatedData = $request->validate(self::VALIDATION_RULE);

            if ($request->file('image') != null) {
                if ($publisher->img != "uploads/noimage.jpg")
                    Storage::delete($publisher->image);
                $validatedData["image"] = ($request->image)->store("uploads/categories");
            } else {
                $validatedData["image"] = "uploads/noimage.jpg";
            }
            $validatedData['slug']=Utility::slugify($validatedData['name']);
            $publisher->fill($validatedData)->save();
            return redirect()->route('publisher.index')->with('success', 'Publisher has been updated successfully');
        }
        return redirect()->back();
    }

    public function destroy(Publisher $publisher)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')) {
            if ($publisher->image != "uploads/noimage.jpg")
                Storage::delete($publisher->image);

            $publisher->delete();
            return redirect()->route('publisher.index')->with('success', 'Publisher has been deleted successfully');
        }
        return redirect()->back();
    }
}
