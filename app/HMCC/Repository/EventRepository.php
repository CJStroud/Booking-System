<?php namespace HMCC\Repository;

use RaceEvent;

class EventRepository extends Repository
{
	protected $eventClassRepository;

	public function __construct(RaceEvent $event, EventClassRepository $eventClassRepository)
	{
		$this->model = $event;

		$this->eventClassRepository = $eventClassRepository;
	}

	public function store($data)
	{
		parent::store($data);

		foreach($data['classes'] as $class)
		{
			$this->eventClassRepository->store($class);
		}
	}

	public function getEventsBeforeClose($timestamp)
	{
		return $this->model->where('close_time', '>', $timestamp)->get();
	}

	public function getEventsAfterClose($timestamp)
	{
		return $this->model->where('close_time', '<=', $timestamp)->get();
	}
}
