<?php

use HMCC\Form\BookingForm;
use HMCC\Repository\FrequencyRepository;
use HMCC\Repository\RaceEventRepository;

class BookingController extends \BaseController {

	protected $layout = 'layouts.master';

	/**
	 * @var BookingForm
	 */
	protected $form;

	/**
	 * @var RaceEventRepository
	 */
	protected $raceEventRepository;

	/**
	 * @var FrequencyRepository
	 */
	protected $frequencyRepository;

	public function __construct(BookingForm $form, RaceEventRepository $raceEventRepository, FrequencyRepository $frequencyRepository)
	{
		$this->form = $form;
		$this->raceEventRepository = $raceEventRepository;
		$this->frequencyRepository = $frequencyRepository;
	}

	public function create($slug)
	{
		if (!Auth::check())
		{
			$message = "You must be logged in to place a booking";
			return Redirect::to('login')->withErrors([$message]);
		}

		$event = $this->raceEventRepository->getEventBySlug($slug);
		$classes = $event->classes;
		$frequencies = $this->frequencyRepository->all();

		return $this->layout->content = View::make('booking.create')->withEvent($event)->withClasses($classes)->withFrequencies($frequencies);
	}

	public function store()
	{

		$this->form->store(Input::all());



		// set up validation rules
		$rules = array(
			'transponder' => 'required|numeric'
		);

		// run validation on inputs against rules
		$validator = Validator::make(
			Input::all(),
			$rules
		);

		// if the validation failed then return to create booking page with error messages
		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		// check to see if the user has already booked in the selected class in the event
		$already_booked = DB::select('SELECT * FROM booking WHERE event_id = ? AND class_id = ? AND user_id = ?',
									 array(Input::get('event-id'), Input::get('class-drop-down'), Session::get('user')->id));

		// return error if they have already booked
		if(!empty($already_booked))
		{
			$message = "You have already made a booking for this event in the selected class";
			return Redirect::back()->withInput()->withErrors($message);
		}

		// check to see if the class has been locked by the admin
		$locked_query = DB::select('SELECT * FROM event_class WHERE event_id = ? AND class_id = ?',
							   array(Input::get('event-id'), Input::get('class-drop-down')));

		// inform the user that the class they chose has been locked
		if ($locked_query[0]->locked)
		{
			$message = "The class you chose has been locked by the race director";
			return Redirect::back()->withInput()->withErrors($message);
		}

		// count the number of bookings for the event and class
		$count_query = DB::select('SELECT COUNT(*) as count FROM booking WHERE event_id = ? AND class_id = ?',
							 array(Input::get('event-id'), Input::get('class-drop-down')));

		$max = $locked_query[0]->maximum;
		$count = $count_query[0]->count;

		// inform the user there are not spaces left for the class they tried to book into
		if($count >= $max)
		{
			$message = "There are no more spaces available for the class you chose";
			return Redirect::back()->withInput()->withErrors($message);
		}
		else
		{

			// retrieve data from input
			$event_id = Input::get('event-id');
			$class_id = Input::get('class-drop-down');
			$user_id = Session::get('user')->id;
			$frequency1 = Input::get('frequency1-drop-down');
			$frequency2 = Input::get('frequency2-drop-down');
			$frequency3 = Input::get('frequency3-drop-down');
			$skill = Input::get('skill-drop-down');
			$transponder = Input::get('transponder');

			// create new booking record
			$result = DB::insert('INSERT INTO booking (event_id, user_id, class_id, frequency_1, frequency_2, frequency_3, skill, transponder) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
								 array($event_id, $user_id, $class_id, $frequency1, $frequency2, $frequency3, $skill, $transponder));

			return Redirect::route('event.index');
		}

	}

	public function destroy($id)
	{
		// delete the booking from the booking table
		DB::statement('DELETE FROM booking WHERE id = ' . $id);

		return Redirect::back();
	}

	public function viewAll()
	{
		// get the user details
		$user = Session::get('user');
		$bookings = null;

		if ($user != null)
		{
			// get all the bookings associated with the user
			$bookings = DB::select('SELECT booking.id, booking.transponder, event.name as EventName, event.event_datetime as EventDate, class.name as ClassName FROM booking JOIN event ON event.id = event_id JOIN class ON class.id = class_id
WHERE user_id = ' . $user->id);

		}

		// create my bookings page and pass in the bookings
		return $this->layout->content = View::make('booking.viewAll')->with('bookings', $bookings);
	}

}
