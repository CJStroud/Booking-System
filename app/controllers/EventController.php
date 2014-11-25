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
			$options = DB::select('select * from class');
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


		$result = DB::select('select * FROM event_class WHERE event_id = ?',
							  array($id));

		dd($result);

		$bookings = DB::select('SELECT user.forename as forename, user.surname as surname, class_id, skill FROM booking INNER JOIN user ON booking.user_id = user.id WHERE event_id = ?', array($id));

		return $this->layout->content = View::make('event.view')->withBookings($bookings)->withEvent($event);
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


}
