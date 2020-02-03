<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function home()
    {
        $news = News::query()->orderByDesc('created_at')->take(3);

        return view('home', compact('news'));
    }
    public function index()
    {
        $news = News::paginate('5');
        return view('news', compact('news'));
    }

    public function store(Request $request)
    {
        $file  = $request->file('image');
        $image = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('/news-image/'), $image);

        News::create([
            'title'   => $request->title,
            'body'    => $request->body,
            'image'   =>$image,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'خبر جدید با موفقیت ایجاد شد.');
    }
    public function show($id)
    {
        $news = News::find($id);
        return view('showNews',compact('news'));
    }
}
