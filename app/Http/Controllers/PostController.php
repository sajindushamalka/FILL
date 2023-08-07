<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\answer;

class PostController extends Controller
{
    //
    public function store(Request $request){

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        Post::create([
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name,
            'question' => $request->question,
            'image' => $imageName
        ]);
        return back();
    }

    public function showOnePost($postid){

        $posts = Post::findOrFail($postid);
        $answers = Answer::where('post_id', $postid)->get();

        return view('onePost', compact('posts','answers'));
    }

    public function myPost(){
        $userid = auth()->user()->id;
        $posts = Post::where('user_id',$userid)->get();
        $answers = Answer::all();

        return view('myPost',compact('posts','answers'));
    }

    public function deletePost($postid){
        $answrs = Answer::where('post_id', $postid)->get();
        $answrs->each->delete();

        Post::findOrFail($postid)->delete();

        return redirect(route('posts.my.all'));
    }
}
