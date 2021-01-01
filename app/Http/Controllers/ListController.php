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


        $lists = ListBook::all();


        return view('List', compact('lists'));
    }

    public function listBook($id)
    {

        if (request('new')) {
            $list = ListBook::whereId()->with(['books' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])->first();

        } else
//            $list = ListBook::find($id);
//            $list = ListBook::find($id)->with('books')->get();
            $list = ListBook::findOrCreate(['name'=> $id] )->withCount('books')->first();
//        $list = $list->first();
//dd($list);
        return view('listBook', compact('list'));
    }

    public function store(Request $request)
    {

        $file = $request->file('image');
        $image = time() . '.' . $file->getClientOriginalExtension();
        // $file->move(public_path('/list-image/'), $image);
        Image::make($file)->resize(300, 300)->save(public_path('/list-image/') . $image, 100);
        ListBook::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return back();
    }
}
