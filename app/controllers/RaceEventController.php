<?php

use HMCC\Form\RaceEventForm;

class RaceEventController extends \BaseController {

	protected $layout = 'layouts.master';

	/**
	 * @var RaceEventForm
	 */
	protected $form;

	public function __construct(RaceEventForm $form)
	{
		$this->form = $form;
	}

	public function index()
	{
		$timestamp = time();

		$events = $this->form->repository->getEventsBeforeClose($timestamp);

		$oldevents = $this->form->repository->getEventsAfterClose($timestamp);

		return $this->layout->content = View::make('event.index')->with('events', $events)->with('old_events', $oldevents);
	}

	public function create()
	{
		// todo add validation that user is an admin
		$options = DB::select('SELECT * FROM class WHERE active = true');
		return $this->layout->content = View::make('event.create')->withOptions($options);
	}

	public function store()
	{
		$this->form->store(Input::all());

		return Redirect::route('event.index');
	}

	public function show($slug)
	{
		$event = $this->form->repository->getEventBySlug($slug);
		$classes = $event->classes;

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
