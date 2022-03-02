<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

    // $doc= YamlFrontMatter::parseFile(
    //     resource_path('posts/3rdPost.html')
    // );

    // ddd($doc);
    $posts = Post::latest()->with('user','category')->get();
    // ddd ($posts);
    return view('posts',['posts'=>$posts]);
});

Route::get('post/{post:slug}', function (Post $post) {

    // $post = Post::findorFail($id);
    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}', function (Category $category) {

    // $post = Post::findorFail($id);
    return view('posts', ['posts' => $category->posts->load(['category','user'])]);
});
Route::get('author/{user:username}', function (User $user) {

    // dd($user);

    // $post = Post::findorFail($id);
    return view('posts', ['posts' => $user->posts->load(['category','user'])]);
});


// })->where('post', '[A-z_\-]+');
