<?php namespace HMCC\Repository;

use RaceClass;

class RaceClassRepository extends Repository
{
	public function __construct(RaceClass $raceClass)
	{
		$this->model = $raceClass;
	}
}
