<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'DashboardController@index');

Route::resource('resolutions', 'ResolutionsController');
Route::resource('tasks', 'TasksController');

// API
Route::group(['namespace' => 'api',  'prefix' => 'api'], function() {

	Route::put('tasks/{task_id}/toggle', 'TasksController@toggle');

	Route::resource('tasks', 'TasksController');
});
