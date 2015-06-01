<?php

use HMCC\Form\Booking\BookingForm;
use HMCC\Repository\Booking\FrequencyRepository;
use HMCC\Repository\Booking\BookingRepository;
use HMCC\Repository\Booking\BookingFrequencyRepository;
use HMCC\Repository\RaceEvent\RaceEventRepository;
use HMCC\Repository\RaceEvent\RaceClassRepository;

class BookingController extends \BaseController {

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


	/**
	* @var BookingFrequencyRepository
	*/
	protected $bookingFrequencyRepository;

	public function __construct(BookingForm $form, RaceEventRepository $raceEventRepository, FrequencyRepository $frequencyRepository, BookingFrequencyRepository $bookingFrequencyRepository, BookingRepository $bookingRepository, RaceClassRepository $raceClassRepository)
	{
		$this->form = $form;
		$this->raceEventRepository = $raceEventRepository;
		$this->frequencyRepository = $frequencyRepository;
		$this->bookingFrequencyRepository = $bookingFrequencyRepository;
		$this->bookingRepository = $bookingRepository;
		$this->raceClassRepository = $raceClassRepository;
	}

	public function create($slug) {
		return $this->createWithClassId($slug, null);
	}

	public function createWithClassId($slug, $class_id) {
		$event = $this->raceEventRepository->getEventBySlug($slug);
		$classes = $event->classes;
		$frequencies = $this->frequencyRepository->all();

		return View::make('booking.create')->withEvent($event)->withClasses($classes)->withFrequencies($frequencies)->withSelected($class_id);
	}

	/**
	 * Saves a new booking record
	 * @returns Redirect redirects the user to the event index page
	 */
	public function store() {
		$this->form->store(Input::all());
		$bookings = $this->bookingRepository->getAllUser(Auth::id());
		$bookingId = end($bookings)->id;
		return Redirect::route('booking.confirmation', ['booking' => $bookingId]);
	}

	/**
	* Deletes a booking record using the id given
	* @param   integer       $id The id of the booking to delete
	* @returns Redirect.Back redirects the user back to the previous page
	*/
	public function destroy($id)
	{
		$booking = Booking::find($id);

		$this->bookingFrequencyRepository->deleteByBookingId($id);

		$booking->delete();

		return Redirect::back();
	}

	public function showUserBookings() {
		if (Auth::check()) {
			$date = new DateTime();
			$bookings = $this->form->repository->getAllUserAfterDate(Auth::id(), $date);
			return View::make('booking.showUserBookings')->with('bookings', $bookings);
		}
	}

	public function confirmation($bookingId) {
		$booking = $this->bookingRepository->find($bookingId);
		$event = $this->raceEventRepository->find($booking->event_id);
		$class = $this->raceClassRepository->find($booking->class_id);

		$timestamp = $event->start_time;
		$event->date = date('j F Y', $timestamp);
		$event->time = date('G:i', $timestamp);

		return View::make('booking.confirmation')->withBooking($booking)->withEvent($event)->withClass($class);
	}

}
