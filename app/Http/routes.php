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
Route::post('user/{id}', 'UserController@actionUploadImage');
Route::put('user/{id}', 'UserController@actionUpdate');

// Movies routes.

Route::get('movies', 'MovieController@viewReadAll');
Route::get('movies/create', 'MovieController@viewCreate');
Route::get('movies/{id}', 'MovieController@viewReadOne');
Route::get('movies/{id}/edit', 'MovieController@viewUpdate');
Route::post('movies', 'MovieController@actionCreate');
Route::post('movies/{id}', 'MovieController@actionUploadImage');
Route::put('movies/{id}', 'MovieController@actionUpdate');
Route::delete('movies/{id}', 'MovieController@actionDelete');

// Genre routes.

Route::get('genres', 'GenreController@viewReadAll');
Route::get('genres/create', 'GenreController@viewCreate');
Route::get('genres/{id}', 'GenreController@viewReadOne');
Route::get('genres/{id}/edit', 'GenreController@viewUpdate');
Route::post('genres', 'GenreController@actionCreate');
Route::put('genres/{id}', 'GenreController@actionUpdate');
Route::delete('genres/{id}', 'GenreController@actionDelete');

// Rating routes.

Route::get('ratings', 'RatingController@viewReadAll');
Route::get('ratings/create', 'RatingController@viewCreate');
Route::get('ratings/{id}', 'RatingController@viewReadOne');
Route::get('ratings/{id}/edit', 'RatingController@viewUpdate');
Route::post('ratings', 'RatingController@actionCreate');
Route::put('ratings/{id}', 'RatingController@actionUpdate');
Route::delete('ratings/{id}', 'RatingController@actionDelete');

// Director routes.

Route::get('directors', 'DirectorController@viewReadAll');
Route::get('directors/create', 'DirectorController@viewCreate');
Route::get('directors/{id}', 'DirectorController@viewReadOne');
Route::get('directors/{id}/edit', 'DirectorController@viewUpdate');
Route::post('directors', 'DirectorController@actionCreate');
Route::put('directors/{id}', 'DirectorController@actionUpdate');
Route::delete('directors/{id}', 'DirectorController@actionDelete');

// Writer routes.

Route::get('writers', 'WriterController@viewReadAll');
Route::get('writers/create', 'WriterController@viewCreate');
Route::get('writers/{id}', 'WriterController@viewReadOne');
Route::get('writers/{id}/edit', 'WriterController@viewUpdate');
Route::post('writers', 'WriterController@actionCreate');
Route::put('writers/{id}', 'WriterController@actionUpdate');
Route::delete('writers/{id}', 'WriterController@actionDelete');

// Cast routes.

Route::get('cast', 'CastController@viewReadAll');
Route::get('cast/create', 'CastController@viewCreate');
Route::get('cast/{id}', 'CastController@viewReadOne');
Route::get('cast/{id}/edit', 'CastController@viewUpdate');
Route::post('cast', 'CastController@actionCreate');
Route::put('cast/{id}', 'CastController@actionUpdate');
Route::delete('cast/{id}', 'CastController@actionDelete');

// Labels routes.

Route::get('labels', 'LabelController@viewReadAll');
Route::get('labels/create', 'LabelController@viewCreate');
Route::get('labels/{id}', 'LabelController@viewReadOne');
Route::get('labels/{id}/edit', 'LabelController@viewUpdate');
Route::post('labels', 'LabelController@actionCreate');
Route::put('labels/{id}', 'LabelController@actionUpdate');
Route::delete('labels/{id}', 'LabelController@actionDelete');

// Lists routes.

Route::get('lists', 'UserListController@viewReadAll');
Route::get('lists/create', 'UserListController@viewCreate');
Route::get('lists/{id}', 'UserListController@viewReadOne');
Route::get('lists/{id}/edit', 'UserListController@viewUpdate');
Route::post('lists', 'UserListController@actionCreate');
Route::put('lists/{id}', 'UserListController@actionUpdate');
Route::delete('lists/{id}', 'UserListController@actionDelete');