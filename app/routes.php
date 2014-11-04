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
Route::resource('tasks.comments', 'tasks\CommentsController');

// API
Route::group(['namespace' => 'api',  'prefix' => 'api'], function() {

	Route::post('tasks/{task_id}/toggle', 'TasksController@toggle');
	Route::get('resolutions/report', 'ResolutionsController@report');
	Route::get('tasks/report', 'TasksController@report');

	Route::resource('tasks', 'TasksController');
	Route::resource('resolutions', 'ResolutionsController');
});

Route::get('test', function() {
	$times = 20000;
	while($times > 0) {
		Task::create([
			'name' => "Task #{$times}",
			'estimation' => $times,
			'done' => ($times % 2 == 0)
		]);
		$times--;
	}
});
