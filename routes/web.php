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


Route::get('/home', 'HomeController@index')->name('home');

/** Authetication Routes */
Auth::routes();


/** Thread Routes */
Route::get('threads','ThreadsController@index');
Route::get('threads/create','ThreadsController@create');
Route::delete('threads/{channel}/{thread}', 'ThreadsController@destroy');
Route::get('threads/{channel}/{thread}', 'ThreadsController@show');
Route::post('threads', 'ThreadsController@store');
Route::post('/threads/{channel}/{thread}/replies','RepliesController@store');


/** Reply Routes */
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::get('/replies/{}');

/** Profile Routes */
Route::get('profiles/{user}','ProfileController@show')->name('profile');


