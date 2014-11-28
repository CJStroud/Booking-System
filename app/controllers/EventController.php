<?php

class EventController extends \BaseController {

	protected $layout = 'layouts.master';

	public function index()
	{
		$date = new DateTime();
		$timestamp = $date->getTimestamp();

		$events = DB::select('select * from event where close_datetime > ?',
							array($timestamp));
		$oldevents = DB::select('select * from event where close_datetime < ?',
							   array($timestamp));

		return $this->layout->content = View::make('event.index')->with('events', $events)->with('old_events', $oldevents);
	}

	public function create()
	{
		$user = Session::get('user');
		if ($user->isAdmin)
		{
			$options = DB::select('SELECT * FROM class WHERE active = true');
			return $this->layout->content = View::make('event.create')->withOptions($options);
		}
		else
		{
			return Redirect::route('event.index');
		}
	}

	public function store()
	{



		$rules = array(
			'name' => 'required',
			'slug' => 'required|alpha_dash',
			'event-datetime' => 'required|date_format:"d/m/Y H:i"',
			'close-datetime' => 'required|date_format:"d/m/Y H:i"',
		);

		$validator = Validator::make(
			Input::all(),
			$rules
		);

		$json_classes = JSON_decode(Input::get('classes'), true);

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		else if (empty($json_classes))
		{
			return Redirect::back()->withInput()->withErrors(['Event requires at least one class']);
		}
		else
		{
			// convert from string to datetime
			$event_date = DateTime::createFromFormat('d/m/Y H:i', Input::get('event-datetime'));
			$close_date = DateTime::createFromFormat('d/m/Y H:i', Input::get('close-datetime'));


			$name = Input::get('name');
			$slug = Input::get('slug');
			$event_datetime = $event_date->getTimestamp();
			$close_datetime = $close_date->getTimestamp();


			$success = DB::statement('INSERT INTO event (name, slug, event_datetime, close_datetime) VALUES (?, ?, ?, ?)',
									array($name, $slug, $event_datetime, $close_datetime));

			$event_id = DB::select('SELECT LAST_INSERT_ID() as id');

			$id = current($event_id)->id;

			//add each class to the event_class table
			foreach($json_classes as $class)
			{
				$classId = $class['id'];
				$limit = $class['limit'];

				DB::statement('INSERT INTO event_class (event_id, class_id, maximum, locked) values (?, ?, ?, ?)',
							 array($id, $classId, $limit, false));
			}

			return Redirect::route('event.index');
		}
	}

	public function show($slug)
	{
		$result = DB::select('SELECT * FROM event where slug = ?', array($slug));

		$event = $result[0];
		$id = $event->id;


		$result = DB::select('
					SELECT class_id, event_id, locked, class.name as name, maximum as max
					FROM event_class
					INNER JOIN class ON event_class.class_id = class.id
					WHERE event_id = ?',
							  array($id));

		$classes = [];
		$frequencies = [];

		$frequencies = DB::select('SELECT * FROM frequency');

		foreach($result as $class)
		{
			$bookings = DB::select('
				SELECT
				user.forename as forename, user.surname as surname, user.brca as brca,
				class_id, skill, transponder, frequency_1, frequency_2, frequency_3
				FROM booking
				INNER JOIN user ON booking.user_id = user.id
				WHERE event_id = ? AND class_id = ?',
				array($class->event_id, $class->class_id));

			$class->bookings = $bookings;
			$class->count = count($bookings);
			array_push($classes, $class);

		}

		return $this->layout->content = View::make('event.view')->with('classes', $classes)->with('event', $event);
	}

	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

	public function lock($classId, $eventId)
	{
		$result = DB::update('UPDATE event_class SET locked = true WHERE class_id = ? AND event_id = ?', array($classId, $eventId));

		$message = null;

		if($result == true)
		{
			$message = "Class was locked";
		}
		else
		{
			$message = "Class could not be locked";
		}

		return Redirect::back()->withError($message);
	}

	public function unlock($classId, $eventId)
	{
		$result = DB::update('UPDATE event_class SET locked = false WHERE class_id = ? AND event_id = ?', array($classId, $eventId));

		$message = null;

		if($result == true)
		{
			$message = "Class was unlocked";
		}
		else
		{
			$message = "Class could not be unlocked";
		}

		return Redirect::back()->withError($message);
	}


}
