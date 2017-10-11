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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/news', 'NewsController');

Route::post('/question', 'QuestionController@store');

Route::get('/schedule', function () {
    return view('schedule.index');
});

Route::get('/exhibitors', function () {
    return view('exhibitors.index');
});

Route::get('/lectours', function () {
    return view('lectours.index');
});