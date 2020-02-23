<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeBook($id)
    {
        Comment::find($id)->likes()->create([
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }
}
