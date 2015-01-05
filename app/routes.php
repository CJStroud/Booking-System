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
Route::get('/', function() {
  return View::make('index');
});
Route::resource('event', 'RaceEventController');
Route::get('booking/create/{slug}', ['uses' => 'BookingController@create', 'as' => 'booking.create']);
Route::get('booking/create/{slug}/{class_id}', ['uses' => 'BookingController@createWithClassId', 'as' => 'booking.create.class']);
Route::resource('booking', 'BookingController', ['except' => 'create']);
Route::get('/login', [ 'uses' => 'UserController@login', 'as' => 'user.login' ]);
Route::post('/login', [ 'uses' => 'UserController@attemptLogin', 'as' => 'user.login.attempt' ]);
Route::get('/signout', 'UserController@signOut');
Route::get('/signup', 'UserController@signUp');
Route::resource('user', 'UserController');
Route::get('/admin', 'HomeController@AdminHome');
Route::get('/my-bookings', 'BookingController@viewAll');
Route::resource('class', 'RaceClassController');
Route::post('/class/disable/{id}', 'RaceClassController@disable');
Route::post('/class/enable/{id}', 'RaceClassController@enable');
Route::post('event/unlock/{classId}{eventId}', 'RaceEventController@unlock');
Route::post('event/lock/{classId}{eventId}', 'RaceEventController@lock');

Route::group(array('before' => 'is.logged.in', 'prefix' => 'settings'), function() {

  Route::get('profile', [ 'uses' => 'SettingsController@profile', 'as' => 'settings.profile' ]);

  Route::post('profile', [ 'uses' => 'SettingsController@profileUpdate', 'as' => 'settings.profile.update' ]);

});


Route::filter('is.logged.in', function()
{
  if(!Auth::check())
  {
    return Redirect::route('user.login');
  }
});
