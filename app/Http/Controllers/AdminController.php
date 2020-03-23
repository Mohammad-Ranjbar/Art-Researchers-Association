<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_users()
    {
        $users = User::all();

        return view('adminPanel.users', compact('users'));
    }

    public function editUser($id, Request $request)
    {
        $user        = User::find($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();

        return back();
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();

        return back();
    }
}
