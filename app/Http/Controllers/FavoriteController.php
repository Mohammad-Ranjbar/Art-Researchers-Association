<?php

namespace App\Http\Controllers;

use App\Book;
use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favoriteBook($id)
    {

        Book::find($id)->favorites()->create([
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }

    public function unfavoriteBook($id)
    {
        $unfavorite = Book::find($id)->favorites();
        $unfavorite->delete();
        $unfavorite->detach();

        return back();
    }
}
