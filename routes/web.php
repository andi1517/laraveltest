<?php

use Illuminate\Support\Facades\Route;
//use App\Article;

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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    /* $article = App\Article::all();
    return $article; */
    $article = App\Article::take(3)->latest()->get();
    return view('about', [
        'articles' => $article
    ]);
});

Route::get('/articles', 'ArticlesController@index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
//Route needs {}wildcard, here {article}:
//Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}', 'ArticlesController@show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

Route::get('/test', function () {
    $name = request('name');
    return $name;
});

Route::get('/hello', function () {
    return 'Hello World!';
});

Route::get('/json', function () {
    //Vorsicht URL: http://127.0.0.1:8000/json?name=<script>alert('Hah')</script>
    //deswegen htmlspecialchars($name, ENT_QUOTES) oder e() oder {{...}}"
    //{{!!...!!}} habt wieder auf!
    $name = request('name');
    return view('neu', [
        'foo' => 'bar',
        'name' => $name
    ]);
});

Route::get('/post01/{POST}', function ($post) {
    return 'Hello World!' . $post;
});

Route::get('/post02/{POST}', function ($post) {
    $posts = [
        'foo' => 'bar',
        'name' => 'hzghzgzgzg'
    ];
    return view('post', [
        'post' => $posts[$post] ?? 'Noch nix da in Array!'
    ]);
});
Route::get('/post03/{POST}', function ($post) {
    $posts = [
        'foo' => 'bar',
        'name' => 'hzghzgzgzg'
    ];
    if (!array_key_exists($post, $posts)) {
        abort(404, 'Sorry kein passender Arrayeintrag da!');
    }
    return view('post', [
        'post' => $posts[$post]
    ]);
});
Route::get('/post04/{POST}', 'PostsController@show');
