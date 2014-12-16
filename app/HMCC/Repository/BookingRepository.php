<?php namespace HMCC\Repository;

use Booking;

class BookingRepository extends Repository
{
	protected $userRepository;

	public function __construct(Booking $booking, UserRepository $userRepository)
	{
		$this->model = $booking;
		$this->userRepository = $userRepository;
	}

	public function unique($eventId, $classId, $userId)
	{
		$count = $this->model
			->where('event_id',  '=', $eventId)
			->where('class_id', '=', $classId)
			->where('user_id', '=', $userId)->count;

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
}
