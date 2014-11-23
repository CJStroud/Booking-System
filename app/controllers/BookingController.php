<?php

class BookingController extends \BaseController {

	protected $layout = 'layouts.master';

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($slug)
	{
		$results = DB::select("select * from event where slug ='" .$slug."'");

		if (empty($results))
		{
			return Redirect::route('event.index');
		}
		else
		{
			$event = current($results);
			$class_results = DB::select("select * from event_class where event_id = " . $event->id);

			$classes = [];

			foreach($class_results as $result)
			{
				$class = DB::select('select * from class where id = ' . $result->class_id);

				array_push($classes, current($class));
			}


			return $this->layout->content = View::make('booking.create')->withEvent($event)->withClasses($classes);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'transponder' => 'required|numeric'
		);

		$validator = Validator::make(
			Input::all(),
			$rules
		);


		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		else
		{

			$event_id = Input::get('event-id');
			$class_id = Input::get('class-drop-down');
			$user_id = 1;
			$frequency1_id = Input::get('frequency1-drop-down');
			$frequency2_id = Input::get('frequency2-drop-down');
			$frequency3_id = Input::get('frequency3-drop-down');
			$skill = Input::get('skill-drop-down');
			$transponder = Input::get('transponder');

			dd(Input::all());

			$sql_insert_booking = "insert into booking (`event_id`, `class_id`, `user_id`, `frequency1_id`, `frequency2_id`, frequency3_id`, `skill`, `transponder` values (" . $event_id . ", " . $class_id . ", " . $user_id . ", " . $frequency1_id . ", " . $frequency2_id . ", " . $frequency3_id . ", " . $skill . ", " . $transponder . ")";

			$result = DB::insert($sql_insert_booking);

			dd($result);

			return Redirect::route('event.index');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
