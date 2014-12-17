<?php namespace HMCC\Repository;

use RaceEventClass;
use stdClass;

class RaceEventClassRepository extends Repository
{
	protected $raceClassRepository;
	protected $bookingRepository;

	public function __construct(RaceEventClass $raceEventClass, RaceClassRepository $raceClassRepository, BookingRepository $bookingRepository)
	{
		$this->model = $raceEventClass;
		$this->raceClassRepository = $raceClassRepository;
		$this->bookingRepository = $bookingRepository;
	}

	public function getEventClassesByEventId($id)
	{
		$eventClasses = $this->model->where('event_id', '=', $id)->get();

		$array = [];

		foreach($eventClasses as $eventClass)
		{
			$class = $this->raceClassRepository->find($eventClass->class_id);

			$storedClass = new stdClass();
			$storedClass->id = $class->id;
			$storedClass->name = $class->name;
			$storedClass->active = $class->active;
			$storedClass->locked = $eventClass->locked;

			$storedClass->maxEntrants = $eventClass->limit;
			$storedClass->bookings = $this->bookingRepository->getBookingsByEventIdAndClassId($id, $class->id);

			$array[] = $storedClass;
		}

		return $array;

	}

	public function lock($eventId, $classId)
	{
		$eventClass = $this->model->where('event_id', '=', $eventId)->where('class_id', '=', $classId)->first();

		$eventClass->locked = true;

		$eventClass->save();
	}

	public function unlock($eventId, $classId)
	{
		$eventClass = $this->model->where('event_id', '=', $eventId)->where('class_id', '=', $classId)->first();

		$eventClass->locked = false;

		$eventClass->save();
	}

}
