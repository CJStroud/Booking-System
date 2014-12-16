<?php namespace HMCC\Repository;

use RaceEventClass;

class RaceEventClassRepository extends Repository
{
	public function __construct(RaceEventClass $raceEventClass)
	{
		$this->model = $raceEventClass;
	}
}
