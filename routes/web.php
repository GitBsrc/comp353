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
})->middleware('guest')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts', 'PostController@index')->name('posts');

    Route::get('/event', function () {
        return view('event');
    });

    Route::get('event/{id}', 'EventController@get');

    Route::get('/edit_event/{id}', 'EventController@edit')->name('event');

    Route::get('/event_list', 'EventController@index')->name('event_list');

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

    Route::get('/dm', function () {
        return view('dm');
    });

    Route::get('/dm_recipients', function(){
        return view('dm_recipients');
    });

    Route::get('/postform', function () {
        return view('postform');
    });

    Route::get('/editpost', function () {
        return view('editpost');
    });

    Route::get('/commentpost', function () {
        return view('commentpost');
    });

    Route::get('/profile', 'ProfileController@index')->name('profile');

    Route::get('/group', 'GroupController@index')->name('group');

    Route::get('/groupMembers', function() {
        return view('groupMembers');
    });
    });

    Route::get('event_details/{id}', 'EventController@get_details');

    Route::post('/new_event', 'EventController@store');
