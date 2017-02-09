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

Route::get('/', 'HomeController@welcome');

Route::auth();

//Route::get('/home', 'HomeController@index');
Route::get('tasks/charts',['as'=> 'tasks.charts', 'uses'=> 'TasksController@charts']);
Route::get('tasks/searchapi',['as'=> 'tasks.search', 'uses'=> 'TasksController@searchApi']);
Route::resource('projects','ProjectsController');
Route::resource('tasks','TasksController');
Route::post('tasks/{tasks}/steps/complete','StepsController@completeAll');
Route::delete('tasks/{tasks}/steps/clear','StepsController@clearAll');
Route::resource('tasks.steps','StepsController');

Route::post('tasks/{id}/check',['as'=> 'tasks.check', 'uses'=> 'TasksController@check']);
