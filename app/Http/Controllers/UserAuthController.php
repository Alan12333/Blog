<?php

namespace App\Http\Controllers;

use \Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  //Import the Auth class

class UserAuthController extends Controller
{
    public function index()
    {
        return view("Admin.index");
    }
    public function storage(Request $request)
    {
        $credentials = $request->validate([
            'email'=>["required","string","email"],
            "password"=>["required","string"]
        ]); //Check credentials of the login
        if(!Auth::attempt($credentials,$request->boolean("check"))) //Verify that the check box is active to remember the session.
        {
            throw ValidationException::withMessages([
                "email"=>"Email incorrect"
            ]);
        }
        $request->session()->regenerate();//The function is regernerated  
        return redirect("Admin/");//Redirected to where you tried to enter from the beginning.
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route("user.login");
    }
}
