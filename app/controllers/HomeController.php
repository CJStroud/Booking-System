<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function AdminHome()
	{
		$classes = DB::select('SELECT * FROM class WHERE active = true');
		$disabled = DB::select('SELECT * FROM class WHERE active = false');

		return View::make('admin.home')->withClasses($classes)->withDisabled($disabled);
	}

}
