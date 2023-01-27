<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function details($slug)
    {
        $detail = Post::where("slug", $slug)->get();
        $cont = Post::where("slug", $slug)->get()->count();
        if($cont === 0 )
        {
            return view("error");
        }
        else{
            return view("detail",compact('detail'));
        }
        
    }
}
