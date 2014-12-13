<?php namespace HMCC\Repository;

use EventClass;

class EventClassRepository extends Repository
{
	public function __construct(EventClass $eventClass)
	{
		$this->model = $eventClass;
	}
}
