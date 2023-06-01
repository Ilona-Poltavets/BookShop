<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function update(Request $request)
    {
        $rating = new Rate();
        $rating->book_id = $request->input('book_id');
        $rating->rate = $request->input('rating');
        $rating->user_id = Auth::user()->id;

        $rating->save();

        return redirect()->back();
    }
}
