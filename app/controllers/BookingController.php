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
		$user = Session::get('user');

		if ($user == null)
		{
			$message = "You must be logged in to place a booking";
			return Redirect::to('login')->withErrors([$message]);
		}

		$results = DB::select('SELECT * FROM event WHERE slug = ?', array($slug));

		if (empty($results))
		{
			return Redirect::route('event.index');
		}
		else
		{
			$event = current($results);
			$class_results = DB::select('SELECT * FROM event_class WHERE event_id = ?', array($event->id));

			$classes = [];

			foreach($class_results as $result)
			{
				$class = DB::select('SELECT * FROM class WHERE id = ?', array($result->class_id));

				array_push($classes, current($class));
			}

			$frequencies = DB::select('SELECT * FROM frequency');

			return $this->layout->content = View::make('booking.create')->withEvent($event)->withClasses($classes)->withFrequencies($frequencies);
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


//			dd(Input::all());

			$sql_insert_booking = "insert into booking (`event_id`, `user_id`, `class_id`, `frequency1_id`, `frequency2_id`, `frequency3_id`, `skill`, `transponder`) VALUES (" . $event_id . ", " . $user_id . ", " . $class_id . ", " . $frequency1_id . ", " . $frequency2_id . ", " . $frequency3_id . ", " . $skill . ", '" . $transponder . "')";

			$result = DB::insert($sql_insert_booking);

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
		DB::statement('DELETE FROM booking WHERE id = ' . $id);

		return Redirect::back();
	}

	public function viewAll()
	{
		$user = Session::get('user');
		$bookings = null;
		if ($user != null)
		{
			$bookings = DB::select('SELECT booking.id, booking.transponder, event.name as EventName, event.event_datetime as EventDate, class.name as ClassName FROM booking JOIN event ON event.id = event_id JOIN class ON class.id = class_id
WHERE user_id = ' . $user->id);

		}
		return $this->layout->content = View::make('booking.viewAll')->with('bookings', $bookings);
	}

}
