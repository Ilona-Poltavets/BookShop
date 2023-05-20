<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    const VALIDATION_RULE = [
        'name' => 'required',
        'name_ukr' => 'required',
//        'label' => 'required|unique',
//        'img' => 'image|mimes:jpg,jpeg,png',
    ];

    function index()
    {
        $data['genres'] = Genre::all();
        return view('genres.index', $data);
    }

    function show($id)
    {
        $data['genre'] = Genre::find($id);
        $data['books'] = $data['genre']->books;
//        $genre = Genre::find($id);
//        $books = $genre->books;
        return view('genres.show', $data);
    }

    function create()
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')){
            return view('genres.create');
        }
        return redirect()->back();
    }

    function edit($id)
    {
        if (Auth::user() && Auth::user()->hasPermission('edit_genre')){
            $genre = Genre::find($id);
            return view('genres.edit', compact('genre'));
        }
        return redirect()->back();
    }

    function store(Request $request)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_genre')){
            $validatedData = $request->validate(self::VALIDATION_RULE);

            if ($request->file('image') != null) {
                $validatedData["img"] = ($request->image)->store("uploads/genres");
            } else {
                $validatedData["img"] = "css/not_found_image.jpg";
            }

            Genre::create($validatedData);

            return redirect()->route('genres.index')->with('success', 'Genre has been created successfully');
        }
        return redirect()->back();
    }

    function update(Request $request, $id)
    {
        if (Auth::user() && Auth::user()->hasPermission('edit_genre')){
            $genre = Genre::find($id);

            $validatedData = $request->validate(self::VALIDATION_RULE);

            if ($request->file('image') != null) {
                if ($genre->img != "uploads/noimage.jpg")
                    Storage::delete($genre->img);
                $validatedData["img"] = ($request->image)->store("uploads/genres");
            } else {
                $validatedData["img"] = "uploads/noimage.jpg";
            }

            $genre->fill($validatedData)->save();

            return redirect()->route('genres.index')->with('success', 'Genre has been updated successfully');
        }
        return redirect()->back();
    }

    function destroy($id)
    {
        if (Auth::user() && Auth::user()->hasPermission('delete_genre')){
            $genre = Genre::find($id);
            if ($genre->img != "uploads/noimage.jpg")
                Storage::delete($genre->img);
            $genre->delete();
            return redirect()->route('genres.index')->with('success', 'Genre has been deleted successfully');
        }
        return redirect()->back();
    }
}
