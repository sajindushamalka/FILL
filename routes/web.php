<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/post/store',[App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/post/all',[App\Http\Controllers\AllPostController::class, 'displayAllPost'])->name('posts.all');
Route::get('/post/{postId}/one',[App\Http\Controllers\PostController::class, 'showOnePost'])->name('posts.one');
Route::get('/post/my/{id}',[App\Http\Controllers\AllPostController::class, 'DisplayMyPost'])->name('posts.mypost');
Route::get('/post/myPost',[App\Http\Controllers\PostController::class, 'myPost'])->name('posts.my.all');
Route::get('/post/myPost/delete/{postid}',[App\Http\Controllers\PostController::class, 'deletePost'])->name('posts.my.delete');

Route::post('/answer/store/{post_id}',[App\Http\Controllers\AnswerController::class, 'store'])->name('answer.store');
Route::get('/answer/store/{user_id}',[App\Http\Controllers\AnswerController::class, 'displayAllAnswers'])->name('answer.all');