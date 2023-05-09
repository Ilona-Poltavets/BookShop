<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,$book_id)
    {
        $comment=new Comment();
        $comment->user_id=Auth::user()->id;
        $comment->book_id=$book_id;
        $comment->text=$request->commentText;

        $comment->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $comment=Comment::find($id);
        $comment->text=$request->commentText;

        $comment->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment=Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
