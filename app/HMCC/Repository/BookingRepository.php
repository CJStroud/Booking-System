<?php namespace HMCC\Repository;

use User;
use Booking;
use RaceClass;
use RaceEvent;

class BookingRepository extends Repository
{
	protected $userRepository;

	protected $raceEventRepository;

	protected $raceClassRepository;

	public function __construct(Booking $booking)
	{
		$this->model = $booking;
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
			$user = User::find($booking->user_id);
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
			$class = RaceClass::find($booking->class_id);
			$event = RaceEvent::find($booking->event_id);

			$booking->raceClass = $class->name;
			$booking->raceEvent = $event->name;
			$booking->startTime = $event->start_time;
			$result[] = $booking;
		}

		return $result;
	}
}
