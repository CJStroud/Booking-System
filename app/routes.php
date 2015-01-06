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

Route::get('/about', function() {
    return View::make('info.about');
});

Route::get('/contact', function() {
    return View::make('info.contact');
});

Route::get('/gallery', function() {
    return View::make('info.gallery');
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

  Route::get('account', [ 'uses' => 'SettingsController@account', 'as' => 'settings.account' ]);

  Route::post('account/password', [ 'uses' => 'SettingsController@accountPassword', 'as' => 'settings.account.password.update' ]);

  Route::post('account', [ 'uses' => 'SettingsController@accountDelete', 'as' => 'settings.account.delete' ]);

});


Route::filter('is.logged.in', function()
{
  if (!Auth::check())
  {
    return Redirect::route('user.login');
  }
});

Route::filter('force.ssl', function()
{
  if (!Request::secure())
  {
    return Redirect::secure(Request::path());
  }
});
