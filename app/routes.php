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
	return View::make('index');
});


Route::resource('event', 'EventController');
Route::get('booking/create/{slug}', 'BookingController@create');
Route::resource('booking', 'BookingController');
Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@attemptLogin');
