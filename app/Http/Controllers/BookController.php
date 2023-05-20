<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
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
        $data['book'] = Book::find($id);
        $data['comments'] = Comment::where('book_id', $id)->orderBy('created_at', 'desc')->get();
        return view('book.show', $data);
    }

    function create()
    {
        if (Auth::user() && Auth::user()->hasPermission('add_book')) {
            return view('book.create');
        }
        return redirect()->back();
    }

    function edit($id)
    {
        if (Auth::user() && Auth::user()->hasPermission('edit_book')) {
            $book = Book::find($id);
            return view('book.edit', compact('book'));
        }
        return redirect()->back();
    }

    function store(Request $request)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_book')) {

            $validatedData = $request->validate(self::VALIDATIO_RULE);

            if ($request->availability == 1) {
                $validatedData['availability'] = $request->availability;
            } else {
                $validatedData['availability'] = false;
            }

            $id = Book::create($validatedData)->id;

            if ($request->hasFile('img')) {
                foreach ($request->file('img') as $image) {
                    DB::table('images_to_book')->insert([
                        'book_id' => $id,
                        'path' => $image->store('uploads/books/' . $id)
                    ]);
                }
            }

            return redirect()->route('books.index')->with('success', 'Book has been created successfully');
        }
        return redirect()->back();
    }

    function update(Request $request, $id)
    {
        if (Auth::user() && Auth::user()->hasPermission('edit_book')){
            $book = Book::find($id);

            $validatedData = $request->validate(self::VALIDATIO_RULE);
            if ($request->hasFile('img')) {
                foreach ($request->file('img') as $image) {
                    DB::table('images_to_book')->insert([
                        'book_id' => $id,
                        'path' => $image->store('uploads/books/' . $id)
                    ]);
                }
            }

            if ($request->availability == 1) {
                $validatedData['availability'] = $request->availability;
            } else {
                $validatedData['availability'] = false;
            }

            $book->fill($validatedData)->save();

            return redirect()->route('books.index')->with('success', 'Book has been updated successfully');
        }

        return redirect()->back();
    }

    function destroy($id)
    {
        if (Auth::user() && Auth::user()->hasPermission('delete_book')) {
            $book = Book::find($id);
            Storage::deleteDirectory('uploads/books/' . $id);
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Book has been deleted successfully');
        }
        return redirect()->back();
    }
}
