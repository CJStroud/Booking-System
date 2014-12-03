<?php

class ClassController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Input::get('name') != null)
		{
			$name = Input::get('name');

			$result = DB::select('SELECT * FROM class WHERE name = ?', array($name));

			if (empty($result))
			{
				DB::insert('INSERT INTO class (name, active) VALUES (?, ?)', array($name, true));
			}
			else
			{
				$class = $result[0];
				DB::update('UPDATE class SET active = true WHERE id = ?', array($class->id));
			}
		}

		return Redirect::to('/admin');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$result = DB::select('SELECT * FROM class WHERE id = ?', array($id));

		if (!empty($result))
		{
			DB::delete('DELETE FROM class WHERE id = ?', array($id));
		}

		return Redirect::to('/admin');
	}

	public function disable($id)
	{
		DB::update('UPDATE class SET active = false WHERE id = ?', array($id));
		return Redirect::to('/admin');
	}

	public function enable($id)
	{
		DB::update('UPDATE class SET active = true WHERE id = ?', array($id));
		return Redirect::to('/admin');
	}

}
