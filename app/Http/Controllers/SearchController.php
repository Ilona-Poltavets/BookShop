<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchBook(Request $request){
        $text_input = $request->input('text_input');
        if ($text_input != '') {
            $data['books'] = DB::table('books')
                ->where('name', '=', "%{$text_input}%")
                ->orWhere('author', '=', "%{$text_input}%")
                ->orWhere('description', '=', "%{$text_input}%")
                ->get();
        } else {
            $data['books'] = Book::all();
        }

        return view('book.index',$data);
    }

    public function suggestions(Request $request)
    {
        $query = $request->input('query');

        if ($query != '') {
            $suggestions = DB::table('books')
                ->where('name', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->get();
        } else {
            $suggestions = Book::all();
        }

        return response()->json($suggestions);
    }
}
