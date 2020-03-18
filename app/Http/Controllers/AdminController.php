<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_users()
    {
        $users = User::all();
        return view('adminPanel.users',compact('users'));
    }


}
