<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use App\Notifications\LikeComment;
use App\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeComment($id)
    {
        $comment = Comment::find($id);
        $comment->likes()->create([
            'user_id' => auth()->user()->id,
        ]);
        if ($comment->user_id != auth()->user()->id) {
            User::find($comment->user_id)->notify(new LikeComment(auth()->user(), $comment));
        }

        return back();
    }

    public function unlikeComment($id)
    {
        Comment::find($id)->likes()->where('user_id', auth()->user()->id)->delete();

        return back();
    }
}
