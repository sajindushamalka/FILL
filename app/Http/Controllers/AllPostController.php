<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AllPostController extends Controller
{
    //
    public function displayAllPost(){

        $posts = Post::all();

        return view('home', compact('posts'));
    }

    public function DisplayMyPost(){

        $id = auth()->user()->id;
        $myposts = Post::findOrFail($id);

        return view('home', compact('id'));

    }
}
