<?php namespace HMCC\Repository;

use RaceEvent;

class RaceEventRepository extends Repository
{
	protected $raceEventClassRepository;

	public function __construct(RaceEvent $raceEvent, RaceEventClassRepository $raceEventClassRepository)
	{
		$this->model = $raceEvent;

		$this->raceEventClassRepository = $raceEventClassRepository;
	}

	public function store($data)
	{
		$event = new $this->model;

		$event->name = $data['name'];
		$event->slug = $data['slug'];
		$event->start_time = $data['start_time'];
		$event->close_time = $data['close_time'];

		$event->save();

		foreach($data['classes'] as $class)
		{
			$this->raceEventClassRepository->store($class);
		}
	}

	public function getEventBySlug($slug)
	{
		$event = $this->model->where('slug', '=', $slug)->firstOrFail();
		$event->classes = $this->raceEventClassRepository->getEventClassesByEventId($event->id);
		return $event;
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
