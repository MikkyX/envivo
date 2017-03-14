<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// TWITTER LOGIN AND CALLBACK FUNCTIONS
Route::get('/','LoginController@index');
Route::get('/twitter/login','LoginController@twitterLogin');
Route::get('/twitter/callback','LoginController@twitterCallback');

// THIS IS WHERE THE MAGIC HAPPENS
Route::get('/form','TwitterController@index');
Route::post('/tweet','TwitterController@postTweet');
Route::get('/logout','TwitterController@logout');

// CONTENT
Route::get('/{page}','ContentController@showPage')
    ->where('page','(about|terms|privacy)');
