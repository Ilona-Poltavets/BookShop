<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['genres']=Genre::all()->sortByDesc('name')->take(10);
        $data['books'] = Book::latest()->limit(20)->get()->sortByDesc('created_at');
        return view('home', $data);
    }
}
