<?php namespace HMCC\Repository;

use BookingFrequency;

class BookingFrequencyRepository extends Repository
{
	/**
	 * @var FrequencyRepository
	 */
	protected $frequencyRepository;

	public function __construct(BookingFrequency $bookingFrequency, FrequencyRepository $frequencyRepository)
	{
		$this->model = $bookingFrequency;
		$this->frequencyRepository = $frequencyRepository;
	}

	/**
	 * Gets all frequencies that are related to the bookingId given
	 * @param Number $bookingId The id of the booking
	 */
	public function getFrequenciesByBookingId($bookingId)
	{
		$bookingFrequencies = $this->model
			->where('booking_id', '=', $bookingId)->get();

		$frequencies = [];

		foreach ($bookingFrequencies as $bookingFrequency)
		{
			$frequency = $this->frequencyRepository->find($bookingFrequency->frequency_id);

			$frequencies[] = $frequency;
		}

		return $frequencies;
	}
}
