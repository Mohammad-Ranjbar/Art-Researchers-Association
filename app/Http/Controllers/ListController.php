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

        return view('List', compact('lists'));
    }

    public function listBook($id)
    {
        $list = ListBook::query()->find($id);


        return view('listBook', compact('list'));
    }

    public function store(Request $request)
    {

        ListBook::query()->create($request->all());

        return back();
    }
}
