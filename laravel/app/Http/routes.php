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

Route::get('/', function () {
    return view('swati/index');
});

Route::group(['middleware' => ['web']], function () {
	Route::resource('book', 'Book\\booksController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('book/books', 'Book\\booksController');
});
Route::resource('projects', 'ProjectController');
Route::resource('tasks/tasks', 'TasksController');

