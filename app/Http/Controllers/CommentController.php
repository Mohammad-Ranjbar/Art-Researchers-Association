<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use App\Forum;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        Book::find($id)->comments()->create([
            'body'    => $request->body,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'نظر شما با موفقیت اضافه شد :)');
    }

    public function forum(Request $request, $id)
    {
        Forum::find($id)->comments()->create([
            'body'    => $request->body,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'نظر شما با موفقیت اضافه شد :)');
    }

    public function update(Request $request, $id)
    {
        Comment::find($id)->update([
            'body' => $request->body,
        ]);

        return back();
    }

    public function commentDelete($id)
    {
        $comment =  Comment::find($id);
        $comment->likes()->delete();
        $comment->delete();

        return back();
    }

    public function forumDelete($id)
    {
        $forum = Forum::find($id);
        $forum->comments()->where('commentable_id', $id)->delete();
        $forum->delete();

        return back();
    }
}
