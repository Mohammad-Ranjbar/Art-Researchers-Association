<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use App\Forum;
use App\Notifications\CommentPost;
use App\User;
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
        $forum = Forum::find($id);

        $forum->comments()->create([
            'body'    => $request->body,
            'user_id' => auth()->user()->id,
        ]);
        User::find($forum->user_id)->notify(new CommentPost(auth()->user(),$forum));
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
