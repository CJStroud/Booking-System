<?php

class HomeController extends BaseController {

	public function AdminHome()
	{
		// check user is admin
		$user = Session::get('user');
		if ($user == null || !$user->isAdmin)
		{
			//if not admin direct back to home/events
			return Redirect::route('event.index');
		}
		else
		{
			// get active classes
			$classes = DB::select('SELECT * FROM class WHERE active = true');

			// get disabled classes
			$disabled = DB::select('SELECT * FROM class WHERE active = false');

			// create admin page and pass in active and disabled classes
			return View::make('admin.home')->withClasses($classes)->withDisabled($disabled);
		}

	}

}
