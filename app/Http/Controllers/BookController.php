<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Book;

class BookController extends Controller
{
    function index()
    {
        $data['books'] = Book::all();
        return view('books.index', $data);
    }
    function show($id)
    {
        $book = Book::find($id);
        return view('books.show', compact($book));
    }
    function create(){
        return view('books.create');
    }
    funciton edit($id){
        $book=Book::find($id);
        return view('books.edit',compact($book));
    }
}
