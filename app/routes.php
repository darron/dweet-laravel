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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('dweet/for/{name}', 'DweetController@getIndex');

Route::get('dweet', 'DweetController@getIndex');

Route::get('get/latest/dweet/for/{name}', 'DweetController@getLatest');

Route::get('get/dweets/for/{name}', 'DweetController@getAll');