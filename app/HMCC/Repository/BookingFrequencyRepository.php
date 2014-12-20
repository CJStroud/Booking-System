<?php namespace HMCC\Repository;

use BookingFrequency;

class BookingFrequencyRepository extends Repository
{
	protected $frequencyRepository;

	public function __construct(BookingFrequency $bookingFrequency, FrequencyRepository $frequencyRepository)
	{
		$this->model = $bookingFrequency;
		$this->frequencyRepository = $frequencyRepository;
	}

	public function getFrequenciesByBookingId($bookingId)
	{
		$bookingFrequencies = $this->model
			->where('booking_id', '=', $bookingId)->get();
	}
}
