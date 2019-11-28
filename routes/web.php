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

Route::get('/posts', function () {
    return view('posts');
});
Route::get('/postform', function () {
    return view('postform');
});
Route::get('/editpost', function () {
    return view('editpost');
});
Route::get('/replypost', function () {
    return view('replypost');
});
Route::get('/profile', 'ProfileController@index')->name('profile');

