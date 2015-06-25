<?php
namespace HMCC\Repository\Booking;

use Booking;
use HMCC\Repository\User\UserRepository;
use HMCC\Repository\RaceEvent\RaceClassRepository;
use HMCC\Repository\RaceEvent\RaceEventRepository;
use HMCC\Repository\Booking\BookingFrequencyRepository;
use HMCC\Repository\Booking\BookingRepository;
use HMCC\Repository\Repository;

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
			$frequencies = $this->bookingFrequencyRepository->getFrequenciesByBookingId($booking->id);
			$booking->user = $user;
			$booking->frequencies = $frequencies;

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
			$booking->closeTime = $event->close_time;
			$booking->frequencies = $frequencies;
			$result[] = $booking;
		}

		return $result;
	}

	public function getAllUserAfterDate($userId, $date)
	{
		$bookings = $this->getAllUser($userId);
		return array_filter($bookings, function($booking) use($date) {
			return $booking->closeTime > $date->getTimestamp();
		});
	}

	public function deleteByEventId($id)
	{
		$bookings = $this->model->where('event_id', $id)->get();
		foreach ($bookings as $book)
		{
			$this->delete($book->id);
		}
	}

	public function delete($id)
	{
		$this->bookingFrequencyRepository->deleteByBookingId($id);
		parent::delete($id);
	}



	public function store($data)
	{
		$booking = new Booking;

		$booking->fill($data);

		$success = $booking->save();

		$bookingId = $booking->id;

		if ($success)
		{
			foreach ($data['frequencies'] as $frequencyId)
			{
				$bookingFrequency = [];
				$bookingFrequency['frequency_id'] = $frequencyId;
				$bookingFrequency['booking_id'] = $bookingId;

				$this->bookingFrequencyRepository->store($bookingFrequency);
			}
		}

		return $success;

	}

}
