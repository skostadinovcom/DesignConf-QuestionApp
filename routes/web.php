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

Route::get('/', 'HomeController@index');

//News routes
Route::group([], function() {
    Route::get('/news', 'NewsController@index');
    Route::get('/news/{id}', 'NewsController@show');

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
        Route::get('/news', 'NewsController@admin_index');
        Route::get('/news/create', 'NewsController@create');
        Route::post('/news/', 'NewsController@store');
        Route::get('/news/{id}', 'NewsController@edit');
        Route::put('/news/{id}', 'NewsController@update');
        Route::delete('/news/{id}', 'NewsController@destroy');
    });
});

//Live board routes
Route::group([], function() {
    Route::post('/live/question', 'LiveController@store_question');
    Route::post('/live/manager', 'LiveController@live_manage');
    Route::get('/live/{ajax?}', 'LiveController@index');

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
        Route::get('/live/', 'LiveController@live');
    });
});

//Speakers routes
Route::group([], function() {
    Route::get('/speakers', 'SpeakersController@index');
    Route::get('/speaker/{id}', 'SpeakersController@show');

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
        Route::get('/speakers', 'SpeakersController@admin_index');
        Route::get('/speaker/create', 'SpeakersController@create');
        Route::post('/speaker/', 'SpeakersController@store');
        Route::get('/speaker/{id}', 'SpeakersController@edit');
        Route::put('/speaker/{id}', 'SpeakersController@update');
        Route::delete('/speaker/{id}', 'SpeakersController@destroy');
    });
});

//Custom Pages routes
Route::group([], function() {
    Route::get('/page/{url}', 'PagesController@show');

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
        Route::get('/pages', 'PagesController@admin_index');
        Route::get('/page/create', 'PagesController@create');
        Route::post('/page/', 'PagesController@store');
        Route::get('/page/{id}', 'PagesController@edit');
        Route::put('/page/{id}', 'PagesController@update');
        Route::delete('/page/{id}', 'PagesController@destroy');
    });
});
