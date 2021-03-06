<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Image;

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
        Image::make($file)->resize(1108, 404)->save(public_path('/news-image/') . $image, 80);

        // $file->move(public_path('/news-image/'), $image);

        News::create([
            'title'   => $request->title,
            'body'    => $request->body,
            'image'   => $image,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'خبر جدید با موفقیت ایجاد شد.');
    }

    public function show($id)
    {
        $news = News::find($id);
        if (is_null($news)) {
            return back();
        } else
            return view('showNews', compact('news'));
    }

    public function comment($id, Request $request)
    {
        News::find($id)->comments()->create([
            'body'    => $request->body,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'نظر شما با موفقیت ثبت شد.');
    }
}
