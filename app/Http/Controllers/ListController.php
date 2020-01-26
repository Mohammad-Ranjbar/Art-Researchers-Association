<?php

namespace App\Http\Controllers;

use App\ListBook;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $lists = ListBook::all();

        return view('List',compact('lists'));
    }
}
