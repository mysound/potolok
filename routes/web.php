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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/comments', 'CommentsController@index');
Route::get('/comments/create', 'CommentsController@create');
Route::post('/comments', 'CommentsController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/settings', 'SettingsController@index');

Route::get('/settings/comments', 'CommentsController@allcomm');
Route::get('/settings/comments/{comment}/edit', 'CommentsController@edit');
Route::put('/settings/comments/{comment}', 'CommentsController@update');
Route::patch('/settings/comments/{comment}', 'CommentsController@publish');
Route::delete('/settings/comments/{comment}', 'CommentsController@destroy');

Route::get('/settings/{block}', 'SettingsController@show');
Route::post('/settings/{block}/elements', 'ElementsController@store');
Route::get('/settings/elements/{element}/edit', 'ElementsController@edit');
Route::put('/settings/elements/{element}', 'ElementsController@update');
Route::delete('/settings/elements/{element}', 'ElementsController@destroy');
