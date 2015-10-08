<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home route.

Route::get('/', 'HomeController@viewHome');

// Registration routes.

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Authentication routes.

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// User routes.

Route::get('user/{id}', 'UserController@viewReadOne');
Route::get('user/{id}/edit', 'UserController@viewUpdate');
Route::put('user/{id}', 'UserController@actionUpdate');

// Movies routes.

Route::get('movies', 'MovieController@viewReadAll');
Route::get('movies/create', 'MovieController@viewCreate');
Route::get('movies/{id}', 'MovieController@viewReadOne');
Route::get('movies/{id}/edit', 'MovieController@viewUpdate');
Route::post('movies', 'MovieController@actionCreate');
Route::put('movies/{id}', 'MovieController@actionUpdate');
Route::delete('movies/{id}', 'MovieController@actionDelete');

// Genre routes.

Route::get('genres', 'GenreController@viewReadAll');
Route::get('genres/{id}', 'GenreController@viewReadOne');

// Rating routes.

Route::get('ratings', 'RatingController@viewReadAll');
Route::get('ratings/{id}', 'RatingController@viewReadOne');

// Director routes.

Route::get('directors', 'DirectorController@viewReadAll');
Route::get('directors/{id}', 'DirectorController@viewReadOne');

// Writer routes.

Route::get('writers', 'WriterController@viewReadAll');
Route::get('writers/{id}', 'WriterController@viewReadOne');

// Cast routes.

Route::get('cast', 'CastController@viewReadAll');
Route::get('cast/{id}', 'CastController@viewReadOne');

// Labels routes.

Route::get('labels', 'LabelController@viewReadAll');
Route::get('labels/{id}', 'LabelController@viewReadOne');