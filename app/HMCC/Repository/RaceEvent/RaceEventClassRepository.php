<?php namespace HMCC\Repository\RaceEvent;

use HMCC\Repository\Repository;
use RaceEventClass;
use stdClass;

class RaceEventClassRepository extends Repository
{
  protected $raceClassRepository;

  public function __construct(RaceEventClass $raceEventClass, RaceClassRepository $raceClassRepository)
  {
    $this->model = $raceEventClass;
    $this->raceClassRepository = $raceClassRepository;
  }

  public function get($eventId, $classId)
  {
    return $this->model->where('event_id', '=', $eventId)->where('class_id', '=', $classId)->first();
  }

  /**
   * Gets all of the classes for an event
   * @param   integer $id The event id
   * @returns array   An array of the classes that are part of the event specified
   */
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

      $array[] = $storedClass;
    }

    return $array;

  }

  /**
   * Locks an event class
   * @param integer $eventId The id of the event
   * @param integer $classId The id of the class
   */
  public function lock($eventId, $classId)
  {
    $eventClass = $this->model->where('event_id', '=', $eventId)->where('class_id', '=', $classId)->first();

    $eventClass->locked = true;

    $eventClass->save();
  }

  /**
   * Unlocks an event class
   * @param integer $eventId The id of the event
   * @param integer $classId The id of the class
   */
  public function unlock($eventId, $classId)
  {
    $eventClass = $this->model->where('event_id', '=', $eventId)->where('class_id', '=', $classId)->first();

    $eventClass->locked = false;

    $eventClass->save();
  }
}
