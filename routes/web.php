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


Route::get('/', 'ThreadController@index')->name('home');

Route::get('/page/{page}', 'ThreadController@nextPage');

Route::get('/threads/{thread}', 'ThreadController@show');

Route::post('/thread/{thread}/comment', 'ThreadCommentController@store');

Route::get('/register', 'RegistrationController@create');

//Route::get('/register', function (){
//    dd('this is the end');
//});

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');

Route::get('/logout', 'SessionsController@destroy');

Route::post('/login', 'SessionsController@store');

Route::get('/user_dashboard', 'DashboardController@index' );

Route::get('/user_thread', 'ThreadController@getUserThread');

Route::get('/user_comment', 'ThreadCommentController@getUserComment');

Route::get('/create-thread', function (){
    return view('tinymce');
});

Route::post('/thread', 'ThreadController@store');
Route::post('/new_thread', 'ThreadController@store');

