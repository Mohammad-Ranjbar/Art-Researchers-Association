<?php

namespace App\Http\Controllers;

use App\Book;
use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favoriteBook($id)
    {

      auth()->user()->favorites()->create([
          'book_id' => $id
      ]);

        return back();
    }
    public function unfavoriteBook($id)
    {

      auth()->user()->favorites()->with('books')->delete();

        return back();
    }
}
