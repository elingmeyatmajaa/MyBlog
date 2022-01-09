<?php

use App\Models\Comment;
use App\Models\Post;
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

Route::get('/insert_comments', function () {
    $comment = Comment::create(['the_comment' => 'This is a second trial comment', 'post_id' => 1, 'user_id' => 1]);
    $post = Post::find(1);
    return $post->comments;
});

Route::get('/comments', function () {
    $comments = Comment::all();
    dd($comments);
});


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/post', function () {
    return view('post');
})->name('post');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
