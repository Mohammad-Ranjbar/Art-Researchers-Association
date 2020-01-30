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

        $file  = $request->file('image');
        $image = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/list-image/'), $image);

        ListBook::create([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $image,
        ]);

        return back();
    }
}
