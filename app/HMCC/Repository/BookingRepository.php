<?php namespace HMCC\Repository;

class BookingRepository extends Repository
{
	public function __construct(Booking $booking)
	{
		$this->model = $booking;
	}
}
