<?php

namespace App\Http\Controllers;

use App\Book;
use App\ListBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function search()
    {
        $query = request('query');
        $books = Book::where('name', 'like', '%' . $query . '%')->get();

        return response()->json($books);
    }

    public function home()
    {
        $books = Book::all()->take(3);

        return view('home', compact('books'));
    }

    public function showBook($id)
    {
        $book = Book::find($id);

        return view('showBook', compact('book'));
    }

    public function store($id, Request $request)
    {
        $file  = $request->file('image');
        $image = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/book-image/'), $image);

        $book = Book::create([
            'name'        => $request->name,
            'publisher'   => $request->publisher,
            'description' => $request->description,
            'image'       => $image,
            'list_id'     => $id,
            'user_id'     => auth()->user()->id,
            'author'      => $request->author,
        ]);

        return back()->with('success','کتاب مورد نظر با موفقیت اضافه شد .');
    }

    public function author($name)
    {
       $books =  Book::where('author',$name)->get();

       return view('authors',compact('books','name')) ;
    }
}
