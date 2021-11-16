<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

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

    $posts = POST::latest()->get();
    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
  
    return view('post', [
         'post' => $post
    ]);
});

Route::get('categories/{category}', function (Category $category) {
    $posts = Post::where('category_id', $category->id)->latest()->get();
    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    $posts = Post::where('user_id', $author->id)->latest()->get();
    return view('posts', [
        'posts' => $posts
    ]);
});