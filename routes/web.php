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

Route::view('/payment', 'payment');

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
    })->name('dm_recipients');
    
    Route::get('/postform', function () {
        return view('postform');
    });
    
    Route::post('/storepost', 'PostController@store');
    
    Route::get('/editpost', function () {
        return view('editpost');
    });

    Route::get('/commentpost', function () {
        return view('commentpost');
    });

    Route::get('/profile', 'ProfileController@index')->name('profile');
    
    Route::get('/profile/{id}', 'ProfileController@get')->name('profile');

    Route::get('/group/{id}', 'GroupController@get');

    Route::get('/create_group', 'GroupController@create')->name('create_group');

    Route::get('/group/{id}/edit_group', 'GroupController@edit');

    Route::get('/group/{id}/add_members', 'GroupMembersController@addMemberForm');

    Route::get('/group/{id}/delete_members', 'GroupMembersController@deleteMemberForm');
});

    Route::get('/group', 'GroupController@index')->name('group');

    Route::get('/groupMembers', function() {
        return view('groupMembers');
    });

    Route::get('event_details/{id}', 'EventController@get_details');

    Route::post('/new_event', 'EventController@store');

    Route::post('/update_event/{id}', 'EventController@update');

    Route::post('/delete_event/{id}', 'EventController@destroy');

    Route::post('/repeat_event/{id}', 'EventController@repeat');
