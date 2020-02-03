<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        Book::find($id)->comments()->create([
            'body'    => $request->body,
            'user_id' =>auth()->user()->id
        ]);

        return back()->with('success','نظر شما با موفقیت اضافه شد :)');
    }
}
