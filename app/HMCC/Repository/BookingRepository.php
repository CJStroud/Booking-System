<?php namespace HMCC\Repository;

class BookingRepository extends Repository
{
	public function __construct(Booking $booking)
	{
		$this->model = $booking;
	}

	public function unique($eventId, $classId, $userId)
	{
		$count = $this->model->where('event_id = ? AND class_id = ? AND user_id = ?',
									 [$eventId, $classId, $userId])->count;

		return $count == 0;
	}
}
