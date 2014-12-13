<?php

class EventController extends \BaseController {

	protected $layout = 'layouts.master';

	public function index()
	{
		// get current timestamp
		$date = new DateTime();
		$timestamp = $date->getTimestamp();

		// get all events that have a close date in the future
		$events = DB::select('select * from event where close_datetime > ?',
							array($timestamp));

		// get all events that have a close date in the past
		$oldevents = DB::select('select * from event where close_datetime < ?',
							   array($timestamp));

		// create event page and give it events and old events
		return $this->layout->content = View::make('event.index')->with('events', $events)->with('old_events', $oldevents);
	}

	public function create()
	{
		$user = Session::get('user');
		// check the user is admin, if not direct to home page
		if ($user == null || !$user->isAdmin)
		{
			return Redirect::route('event.index');
		}
		else
		{
			// get all classes that are active
			$options = DB::select('SELECT * FROM class WHERE active = true');
			// generate create event page and give it the classes that can be used
			return $this->layout->content = View::make('event.create')->withOptions($options);
		}
	}

	public function store()
	{
		$this->form->store(Input::all());

		return Redirect::route('event.index');
	}

	public function show($slug)
	{
		// get event record for the selected slug
		$result = DB::select('SELECT * FROM event where slug = ?', array($slug));

		$event = $result[0];
		$id = $event->id;

		// get all class information for the selected event from class_event and class tables
		$result = DB::select('
					SELECT class_id, event_id, locked, class.name as name, maximum as max
					FROM event_class
					INNER JOIN class ON event_class.class_id = class.id
					WHERE event_id = ?',
							  array($id));

		$classes = [];
		$frequencies = [];

		// get all frequencies
		$frequencies = DB::select('SELECT * FROM frequency');

		// get all the bookings for each class of the event
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

			// add the bookings information to the class
			$class->bookings = $bookings;
			$class->count = count($bookings);
			array_push($classes, $class);

		}

		return $this->layout->content = View::make('event.view')->with('classes', $classes)->with('event', $event);
	}

	public function lock($classId, $eventId)
	{
		// try to lock the event_class record
		$result = DB::update('UPDATE event_class SET locked = true
							WHERE class_id = ? AND event_id = ?',
							 array($classId, $eventId));

		$message = null;

		// if locking was successful
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
		// try to unlock the event_class record
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
