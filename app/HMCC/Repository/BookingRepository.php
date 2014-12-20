<?php namespace HMCC\Repository;

use Booking;
use HMCC\Repository\UserRepository;
use HMCC\Repository\RaceClassRepository;
use HMCC\Repository\RaceEventRepository;
use HMCC\Repository\BookingFrequencyRepository;

class BookingRepository extends Repository
{
	protected $userRepository;

	protected $raceClassRepository;

	protected $raceEventRepository;

	protected $bookingFrequencyRepository;

	public function __construct(
		Booking $booking,
		UserRepository $userRepository,
		RaceClassRepository $raceClassRepository,
		RaceEventRepository $raceEventRepository,
		BookingFrequencyRepository $bookingFrequencyRepository
	)
	{
		$this->model = $booking;
		$this->userRepository = $userRepository;
		$this->raceClassRepository = $raceClassRepository;
		$this->raceEventRepository = $raceEventRepository;
		$this->bookingFrequencyRepository = $bookingFrequencyRepository;
	}

	public function unique($eventId, $classId, $userId)
	{
		$count = $this->model
			->where('event_id',  '=', $eventId)
			->where('class_id', '=', $classId)
			->where('user_id', '=', $userId)->count();

		return $count == 0;
	}

	public function getBookingsByEventIdAndClassId($eventId, $classId)
	{
		$bookings = $this->model
			->where('event_id',  '=', $eventId)
			->where('class_id', '=', $classId)->get();

		$result = [];

		foreach($bookings as $booking)
		{
			$user = $this->userRepository->find($booking->user_id);
			$booking->user = $user;

			$result[] = $booking;
		}

		return $result;
	}

	public function getAllUser($userId)
	{
		$bookings = $this->model->where('user_id',  '=', $userId)->orderBy('event_id')->get();

		$result = [];

		foreach($bookings as $booking)
		{
			$class = $this->raceClassRepository->find($booking->class_id);
			$event = $this->raceEventRepository->find($booking->event_id);
			$frequencies = $this->bookingFrequencyRepository->getFrequenciesByBookingId($booking->id);

			$booking->raceClass = $class->name;
			$booking->raceEvent = $event->name;
			$booking->startTime = $event->start_time;
			$booking->frequencies = $frequencies;
			$result[] = $booking;
		}

		return $result;
	}
}
