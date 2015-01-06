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
            $event_class = [];

            $event_class['class_id'] = $class->id;
            $event_class['event_id'] = $event->id;
            $event_class['limit'] = $class->limit;
            $event_class['locked'] = false;

            $this->raceEventClassRepository->store($event_class);
        }
    }

    public function getEventBySlug($slug)
    {
        $event = $this->model->where('slug', '=', $slug)->firstOrFail();
        $event->classes = $this->raceEventClassRepository->getEventClassesByEventId($event->id);
        return $event;
    }

    public function getAllInDateOrder()
    {
        $events = $this->model->orderBy('start_time', 'desc')->get();
        return $events;
    }

}
