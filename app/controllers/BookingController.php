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

	/**
	 * Saves a new booking record
	 * @returns Redirect redirects the user to the event index page
	 */
	public function store()
	{
		$this->form->store(Input::all());

		return Redirect::route('event.index');
	}

	/**
	 * Deletes a booking record using the id given
	 * @param   integer       $id The id of the booking to delete
	 * @returns Redirect.Back redirects the user back to the previous page
	 */
	public function destroy($id)
	{
		$booking = Booking::find($id);
		$booking->delete();

		return Redirect::back();
	}

	public function viewAll()
	{
		if (Auth::check())
		{
			$bookings = $this->form->repository->getAllUser(Auth::id());
			return $this->layout->content = View::make('booking.viewAll')->with('bookings', $bookings);
		}
	}
}
