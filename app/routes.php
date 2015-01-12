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

Route::get('/', ['as' => 'home', function() {
		return View::make('index');
}]);

Route::get('/about', ['as' => 'about', function() {
		return View::make('info.about');
}]);

Route::get('/contact', ['as' => 'contact', function() {
		return View::make('info.contact');
}]);

Route::get('/gallery', ['as' => 'gallery', function() {
		return View::make('info.gallery');
}]);

Route::resource('event', 'RaceEventController');
Route::get('booking/create/{slug}', ['uses' => 'BookingController@create', 'as' => 'booking.create']);
Route::get('booking/create/{slug}/{class_id}', ['uses' => 'BookingController@createWithClassId', 'as' => 'booking.create.class']);
Route::resource('booking', 'BookingController', ['except' => 'create']);
Route::get('/my-bookings', ['uses' => 'BookingController@showUserBookings', 'as' => 'show.user.bookings' ]);

Route::get('/login', [ 'uses' => 'UserController@login', 'as' => 'user.login' ]);
Route::post('/login', [ 'uses' => 'UserController@attemptLogin', 'as' => 'user.login.attempt' ]);
Route::get('/logout', ['uses' => 'UserController@logOut', 'as' => 'user.logout']);
Route::get('/signup', ['uses' => 'UserController@signUp', 'as' => 'user.signup']);
Route::resource('user', 'UserController', [ 'only' => array('show', 'store') ]);

Route::resource('class', 'RaceClassController');
Route::post('/class/disable/{id}', ['uses' => 'RaceClassController@disable', 'as' => 'class.disable' ]);
Route::post('/class/enable/{id}', ['uses' => 'RaceClassController@enable', 'as' => 'class.enable']);

Route::post('event/unlock/{event_id}/{class_id}', ['uses' => 'RaceEventController@unlock', 'as' => 'event.unlock']);
Route::post('event/lock/{event_id}/{class_id}', ['uses' => 'RaceEventController@lock', 'as' => 'event.lock']);

Route::group(array('before' => 'is.logged.in', 'prefix' => 'settings'), function() {

	Route::get('profile', [ 'uses' => 'SettingsController@profile', 'as' => 'settings.profile' ]);

	Route::post('profile', [ 'uses' => 'SettingsController@profileUpdate', 'as' => 'settings.profile.update' ]);

	Route::get('account', [ 'uses' => 'SettingsController@account', 'as' => 'settings.account' ]);

	Route::post('account/password', [ 'uses' => 'SettingsController@accountPassword', 'as' => 'settings.account.password.update' ]);

	Route::post('account', [ 'uses' => 'SettingsController@accountDelete', 'as' => 'settings.account.delete' ]);

});

Route::group(array('before' => 'is.admin', 'prefix' => 'admin'), function() {

	Route::get('/', ['uses' => 'AdminController@home', 'as' => 'admin.home']);

	Route::get('users', ['uses' => 'AdminController@users', 'as' => 'admin.users']);

	Route::post('users/{id}/ban', ['uses' => 'AdminController@banUser', 'as' => 'admin.user.ban']);

	Route::post('users/{id}/unban', ['uses' => 'AdminController@unbanUser', 'as' => 'admin.user.unban']);

});
