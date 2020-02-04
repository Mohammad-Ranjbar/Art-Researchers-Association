<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::all();

        return view('forum', compact('forums'));
    }

    public function store(Request $request)
    {
        Forum::create([
            'title'   => $request->title,
            'body'    => $request->body,
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }

    public function show($id)
    {
        $forum = Forum::find($id);

        return view('forumShow',compact('forum'));
    }

    public function update(Request $request,$id)
    {
        Forum::find($id)->update([
           'title' => $request->title,
           'body' => $request->body
        ]);

        return back();
    }
}
