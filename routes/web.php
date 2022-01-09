<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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


Route::get('/createpost', function () {

    $post = Post::create([
        'title' => 'This is Post',
        'slug' => 'This-is-slug',
        'excerpt' => 'This is excerpt',
        'body' => 'This is body',
        'user_id' => 1,
        'category_id' => Category::find(1)->id
    ]);



    $post->image()->create(['name' => 'random file', 'extension' => 'jpg', 'path' => '/image/random_file.jpg']);
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
