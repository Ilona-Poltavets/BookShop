<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    const VALIDATIO_RULE = [
        'name' => 'required',
        'description' => 'required',
//        'img.*' => 'image|mimes:jpg,jpeg,png',
        'author' => 'required',
        'isbn' => 'required',
        'price' => 'numeric|required'
    ];

    function index()
    {
        $data['books'] = Book::all();
        return view('book.index', $data);
    }

    function show($id)
    {
        $book = Book::find($id);
        return view('book.show', compact('book'));
    }

    function create()
    {
        return view('book.create');
    }

    function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    function store(Request $request)
    {
//        if (Auth::user() ?->hasPermission('add_book')){
//
//    }
        $validatedData = $request->validate(self::VALIDATIO_RULE);

//        if ($request->file('img') != null) {
//            $validatedData['img'] = ($request->img)->store('uploads/books');
//        }

        if ($request->availability == 1) {
            $validatedData['availability'] = $request->availability;
        } else {
            $validatedData['availability'] = false;
        }

        $id = Book::create($validatedData)->id;

        if ($request->hasFile('img[]')) {
            foreach ($request->file('img[]') as $image) {
                DB::table('images_to_book')->insert([
                    'book_id' => $id,
                    'path' => $image->store('uploads/books/' . $id)
                ]);
            }
        }

        return redirect()->route('books.index')->with('success', 'Book has been created successfully');
    }

    function update(Request $request, $id)
    {
        $book = Book::find($id);

        $validatedData = $request->validate(self::VALIDATIO_RULE);

        foreach ($request->file('img') as $file) {
            $path = $file->store('uploads/books/' . $id);
            $image = new Image();
            $image->book_id = $id;
            $image->path = $path;
            $image->save();
        }

        if ($request->availability == 1) {
            $validatedData['availability'] = $request->availability;
        } else {
            $validatedData['availability'] = false;
        }

        $book->fill($validatedData)->save();

        return redirect()->route('books.index')->with('success', 'Book has been updated successfully');
    }

    function destroy($id)
    {
        $book = Book::find($id);
        Storage::deleteDirectory('uploads/books/' . $id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book has been deleted successfully');
    }
}
