<?php

namespace App\Http\Controllers;

use App\Book;
use App\ListBook;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $lists = ListBook::all();

        return view('List',compact('lists'));
    }
    public function listBook($id)
    {
        $listBook = ListBook::query()->find($id);
        $books = $listBook->books;
        return view('listBook',compact('books'));
    }
}
