<?php namespace HMCC\Repository\RaceEvent;

use HMCC\Repository\Repository;
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

            if (is_object($class))
            {
              $class = json_decode(json_encode($class), true);
            }

            $event_class['class_id'] = $class['id'];
            $event_class['event_id'] = $event->id;
            $event_class['limit'] = $class['limit'];
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
    
    public function delete($id) {
        $classes = $this->raceEventClassRepository->getEventClassesByEventId($id);
        foreach($classes as $class)
        {
            $this->raceEventClassRepository->delete($class->id);
        }
        $this->model->find($id)->delete();
    }

}
