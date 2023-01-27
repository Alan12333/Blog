<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function index()
    {
        return view("Admin.users");
    }

    public function login()
    {
        return view("login");
    }

    public function Add()
    {
        return view("Admin.UserAdd");
    }

    public function Edit($id)
    {
        $user = User::find($id)->get();
        return view("Admin.EditUser", compact("user"));
    }
}
