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

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/dm', function () {
    return view('dm');
});

Route::get('/group', 'GroupController')->name('group');

Route::get('/groupMembers', function() {
    return view('groupMembers');
});