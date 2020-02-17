<?php

namespace App\Http\Controllers;

use App\Book;
use App\ListBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Image;

class ListController extends Controller
{
    public function index()
    {
        if ( ! Cache::has('lists')) {

            $lists = ListBook::all();
            Cache::put('lists', $lists, 60);

            return view('List', compact('lists'));
        }

        $lists = Cache::get('lists');

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
        // $file->move(public_path('/list-image/'), $image);
        Image::make($file)->resize(300, 300)->save(public_path('/list-image/') . $image, 100);
        ListBook::create([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $image,
        ]);

        return back();
    }
}
