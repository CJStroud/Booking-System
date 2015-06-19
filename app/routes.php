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

Route::get('/rules', ['as' => 'rules', function() {
        return View::make('info.rules');
    }]);

Route::get('/contact', ['as' => 'contact', function() {
        return View::make('info.contact');
    }]);

Route::get('/gallery', ['as' => 'gallery', function() {
        return View::make('info.gallery');
    }]);

Route::get('/view-results', ['uses' => 'ResultsController@view', 'as' => 'results.view']);

Route::resource('event', 'RaceEventController');
Route::resource('booking', 'BookingController', ['except' => 'create']);

Route::get('/booking-confirmation/{booking}', ['uses' => 'BookingController@confirmation', 'as' => 'booking.confirmation']);

Route::get('/my-bookings', ['uses' => 'BookingController@showUserBookings', 'as' => 'booking.show.user']);

Route::get('/login', [ 'uses' => 'UserController@login', 'as' => 'user.login']);
Route::post('/login', [ 'uses' => 'UserController@attemptLogin', 'as' => 'user.login.attempt']);
Route::get('/logout', ['uses' => 'UserController@logOut', 'as' => 'user.logout']);
Route::get('/signup', ['uses' => 'UserController@signUp', 'as' => 'user.signup']);
Route::resource('user', 'UserController', [ 'only' => array('show', 'store')]);

Route::resource('class', 'RaceClassController');
Route::post('/class/disable/{id}', ['uses' => 'RaceClassController@disable', 'as' => 'class.disable']);
Route::post('/class/enable/{id}', ['uses' => 'RaceClassController@enable', 'as' => 'class.enable']);

Route::post('event/unlock/{event_id}/{class_id}', ['uses' => 'RaceEventController@unlock', 'as' => 'event.unlock']);
Route::post('event/lock/{event_id}/{class_id}', ['uses' => 'RaceEventController@lock', 'as' => 'event.lock']);


Route::group(array('before' => 'is.admin', 'prefix' => 'admin'), function() {

    Route::get('/', ['uses' => 'AdminController@home', 'as' => 'admin.home']);

    Route::get('users', ['uses' => 'AdminController@users', 'as' => 'admin.users']);

    Route::get('classes', ['uses' => 'AdminController@classes', 'as' => 'admin.classes']);

    Route::get('classes/{id}/edit', [
        'uses' => 'AdminController@editClass',
        'as' => 'admin.classes.edit'
    ]);

    Route::get('classes/create', [
        'uses' => 'AdminController@createClass',
        'as' => 'admin.classes.create'
    ]);

    Route::post('classes/{id}/update', [
        'uses' => 'AdminController@updateClass',
        'as' => 'admin.classes.update'
    ]);

    Route::post('classes/store', [
        'uses' => 'AdminController@storeClass',
        'as' => 'admin.classes.store'
    ]);

    Route::post('classes/delete', [
        'uses' => 'AdminController@deleteClass',
        'as' => 'admin.classes.delete'
    ]);

    Route::post('event/{id}/cancel', [
        'uses' => 'RaceEventController@cancel',
        'as' => 'admin.event.cancel'
    ]);

    Route::post('event/{id}/delete', [
        'uses' => 'RaceEventController@destroy',
        'as' => 'admin.event.delete'
    ]);

    Route::get('event/{id}/edit', [
        'uses' => 'RaceEventController@edit',
        'as' => 'admin.event.edit'
    ]);

    Route::post('event/{id}/update', [
        'uses' => 'RaceEventController@update',
        'as' => 'admin.event.update'
    ]);

    Route::post('users/{id}/ban', ['uses' => 'AdminController@banUser', 'as' => 'admin.user.ban']);

    Route::post('users/{id}/unban', ['uses' => 'AdminController@unbanUser', 'as' => 'admin.user.unban']);

    Route::get('results/create-meeting', ['uses' => 'ResultsController@createMeeting', 'as' => 'admin.create.meeting']);

    Route::post('results/meeting/store', ['uses' => 'ResultsController@storeMeeting', 'as' => 'admin.store.meeting']);
});

//TODO Test

Route::group(array('before' => 'is.logged.in'), function() {

    Route::get('booking/create/{slug}', ['uses' => 'BookingController@create', 'as' => 'booking.create']);
    Route::get('/my-bookings', ['uses' => 'BookingController@showUserBookings', 'as' => 'show.user.bookings' ]);

    Route::group(array('prefix' => 'settings'), function() {

        Route::get('booking/create/{slug}/{class_id}', ['uses' => 'BookingController@createWithClassId', 'as' => 'booking.create.class']);

        Route::get('profile', [ 'uses' => 'SettingsController@profile', 'as' => 'settings.profile']);

        Route::post('profile', [ 'uses' => 'SettingsController@profileUpdate', 'as' => 'settings.profile.update']);

        Route::get('account', [ 'uses' => 'SettingsController@account', 'as' => 'settings.account']);

        Route::post('account/password', [ 'uses' => 'SettingsController@accountPassword', 'as' => 'settings.account.password.update']);

        Route::post('account', [ 'uses' => 'SettingsController@accountDelete', 'as' => 'settings.account.delete']);
    });
});


Route::group(array('prefix' => 'password'), function() {

  Route::get('recover', [ 'uses' => 'RemindersController@getRemind', 'as' => 'password.get.reminder' ]);

  Route::post('recover', [ 'uses' => 'RemindersController@postRemind', 'as' => 'password.send.reminder' ]);

  Route::get('reset/{token}', [ 'uses' => 'RemindersController@getReset', 'as' => 'password.get.reset' ]);

  Route::post('reset', [ 'uses' => 'RemindersController@postReset', 'as' => 'password.send.reset' ]);

});
