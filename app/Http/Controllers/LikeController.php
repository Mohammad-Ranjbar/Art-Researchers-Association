<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeComment($id)
    {
        Comment::find($id)->likes()->create([
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }
    public function unlikeComment($id)
    {
        Comment::find($id)->likes()->where('user_id',auth()->user()->id)->delete();
        return back();
    }
}
