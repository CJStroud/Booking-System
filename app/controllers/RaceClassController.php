<?php

class RaceClassController extends \BaseController {

	public function store()
	{
		$name = Input::get('name');
		// check for input
		if ($name != null)
		{
			// get any results that match the name entered
			$result = DB::select('SELECT * FROM class WHERE name = ?', array($name));

			// if it is a new name then create a new class
			if (empty($result))
			{
				DB::insert('INSERT INTO class (name, active) VALUES (?, ?)', array($name, true));
			}
			// if name exists then set the class property 'active' to true
			else
			{
				$class = $result[0];
				DB::update('UPDATE class SET active = true WHERE id = ?', array($class->id));
			}
		}

		return Redirect::to('/admin');
	}

	public function destroy($id)
	{
		$result = DB::select('SELECT * FROM class WHERE id = ?', array($id));

		// check the class exists
		if (!empty($result))
		{
			// remove the class from the database
			DB::delete('DELETE FROM class WHERE id = ?', array($id));
		}

		return Redirect::to('/admin');
	}

	public function disable($id)
	{
		// set the class property 'active' to false
		DB::update('UPDATE class SET active = false WHERE id = ?', array($id));
		return Redirect::to('/admin');
	}

	public function enable($id)
	{
		// set the class property 'active' to true
		DB::update('UPDATE class SET active = true WHERE id = ?', array($id));
		return Redirect::to('/admin');
	}

}
