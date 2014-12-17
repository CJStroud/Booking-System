<?php namespace HMCC\Repository;

use RaceClass;

class RaceClassRepository extends Repository
{
    public function __construct(RaceClass $raceClass)
    {
        $this->model = $raceClass;
    }

    public function getAllActive()
    {
        return $this->model->where('active', '=', true)->get();
    }
}
