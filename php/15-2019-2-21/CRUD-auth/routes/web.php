<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/post', 'createPostController');
Route::get('post/create', 'createPostController@create')->name('post.create')->middleware('auth');
Route::get('/post', 'createPostController@index')->name('post.index')->middleware('auth');
