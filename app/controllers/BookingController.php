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

		return Redirect::route('event.index');
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
