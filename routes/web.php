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

Route::get('/event', function () {
    return view('event');
});

Route::get('/edit_event', function () {
    return view('edit_event');
});

Route::get('/event_list', function () {
    return view('event_list');
});

Route::get('/create_event', function (){
    return view('create_event');
});

Route::get('/add_manager_info', function() {
    return view('add_manager_info');
});

Route::get('/event_members', function() {
   return view('event_members');
});

Route::get('/profile', 'ProfileController@index')->name('profile');
