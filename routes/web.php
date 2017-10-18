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

//Auth
Auth::routes();

//Home
Route::get('/', function () {
    return view('welcome');
});

//News User
Route::get('/news', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@show');
//News Admin
Route::get('/admin/news', 'NewsController@admin_index');
Route::get('/admin/news/create', 'NewsController@create');
Route::post('/admin/news/', 'NewsController@store');
Route::get('/admin/news/{id}', 'NewsController@edit');
Route::put('admin/news/{id}', 'NewsController@update');
Route::delete('admin/news/{id}', 'NewsController@destroy');

//Live User
Route::post('/live/question', 'LiveController@store_question');
Route::post('/live/manager', 'LiveController@live_manage');
Route::get('/live/{ajax?}', 'LiveController@index');
//Live Admin
Route::get('admin/live/', 'LiveController@live');