<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('layouts-dashboard.home');
    }

    public function edit(Request $request)
    {
        auth()->user()->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);
        $subject = 'تغییر اطلاعات کاربری شما';
        $message = 'اطلاعات شما تغییر یافته است.';

        ini_set("smtp_port", 25);

        Mail::send('email', [], function ($message) {
            $message->to(auth()->user()->email)->subject('تغییرات پروفایل');
        });

        return back();
    }

    public function show()
    {
        return view('layouts-dashboard.editProfile');
    }

    public function createPost()
    {
        return view('layouts-dashboard.createPost');
    }

    public function emailAdmin()
    {
        return view('layouts-dashboard.emailAdmin');
    }

    public function email(Request $request)
    {

        Mail::send('email', ['body' => $request->body], function ($message) use ($request) {

            $message->from($request->email, auth()->user()->name);
            $message->to('mj.ranjbar.94@gmail.com', 'admin')->subject('پیام از طرف کاربر');
        });

        return back()->with('status', 'ایمیل شما به مدیر ارسال شد ');
    }
}
