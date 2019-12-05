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

    Route::get('/join_event/{id}', 'EventMembersController@join');

    Route::get('/leave_event/{id}', 'EventMembersController@leave');

    Route::get('/set_participant/{eventID}/{userID}', 'EventMembersController@setParticipant');

    Route::get('/set_manager/{eventID}/{userID}', 'EventMembersController@setManager');

    Route::get('/create_event', function (){
        return view('create_event');
    });

    Route::get('/add_manager_info', function() {
        return view('add_manager_info');
    });

    Route::get('/event_members/{id}', 'EventMembersController@get');

    Route::get('/profile', 'ProfileController@index')->name('profile');

    Route::get('/dm', function () {
        return view('dm');
    });
    
    Route::get('/postform', function () {
        return view('postform');
    });

    Route::post('/storepost', 'PostController@store');


    Route::get('/commentpost', function () {
        return view('commentpost');
    });

    Route::get('/profile', 'ProfileController@index')->name('profile');
    
    Route::get('/group', 'GroupController@index')->name('group');
    
    Route::get('/groupMembers', function() {
        return view('groupMembers');
    });

    Route::get('/create_post', 'PostController@createPostForm');


    Route::get('/profile/{id}', 'ProfileController@get');

    Route::get('/group_list', 'GroupController@index')->name('group_list');

    Route::get('/group/{id}', 'GroupController@get');

    Route::get('/create_group', 'GroupController@create')->name('create_group');

    Route::post('/new_group', 'GroupController@store');

    Route::get('/group/{id}/edit_group', 'GroupController@edit');

    Route::post('/update_group/{id}', 'GroupController@update');

    Route::post('/delete_group/{id}', 'GroupController@destroy');

    Route::get('/group/{id}/add_members', 'GroupMembersController@addMemberForm');

    Route::post('/add_member/{id}', 'GroupMembersController@store');

    Route::post('/delete_member/{groupID}/{userID}', 'GroupMembersController@deleteMember');

    Route::post('/make_leader/{groupID}/{userID}', 'GroupMembersController@makeLeader');

    Route::get('/group/{id}/delete_members', 'GroupMembersController@deleteMemberForm');

    Route::get('/create_group/{id}', 'GroupController@createEventGroup');

    Route::post('/new_event_group/{id}', 'GroupController@storeEventGroup');

    Route::get('event_details/{id}', 'EventController@get_details');

    Route::post('/new_event', 'EventController@store');

    Route::post('/update_event/{id}', 'EventController@update');

    Route::post('/delete_event/{id}', 'EventController@destroy');

    Route::post('/repeat_event/{id}', 'EventController@repeat');

    Route::get('/dm_recipients', 'DMRecipientController@index');

    Route::get('/dm/{id}', 'DMController@messageForm');
   
    Route::post('/dm/message/{id}', 'DMController@message');

    Route::get('/repeat/{id}', 'EventController@get_repeat');

    Route::post('/editpost', 'PostController@update');
});
