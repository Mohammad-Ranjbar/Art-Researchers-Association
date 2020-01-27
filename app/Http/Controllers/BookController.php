<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function home()
    {
       $books =  Book::all()->take(3);
       return view('home' , compact('books'));
    }
    public function showBook($id)
    {
        $book = Book::find($id);

        return view('showBook' , compact('book'));
    }
}
