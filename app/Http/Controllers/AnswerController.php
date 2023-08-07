<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\answer;

class AnswerController extends Controller
{
    //
    public function store(Request $request,$post_id){
        answer::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post_id,
            'user_name' => auth()->user()->name,
            'answer' => $request->answer
        ]);
        return back();
    }

    public function displayAllAnswers($user_id){
        $answers = answer::findOrFail($user_id);

        return view('onePost', compact('answers'));
    }
}
