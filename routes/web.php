<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('hello', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/test', function (){
    return 'mmm';
});
Route::get('/home', 'HomeController@index');

Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
Route::resource('categories', 'categoryController');

Route::any('posts/delete/{id}', 'PostController@destroy');
