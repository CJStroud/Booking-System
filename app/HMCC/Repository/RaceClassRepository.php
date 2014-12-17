<?php namespace HMCC\Repository;

use RaceClass;

class RaceClassRepository extends Repository
{
    public function __construct(RaceClass $raceClass)
    {
        $this->model = $raceClass;
    }

    /**
     * Gets all the Classes that are active
     * @returns RaceClass All of the records that are active
     */
    public function getAllActive()
    {
        return $this->model->where('active', '=', true)->get();
    }

    /**
     * Disable a class record
     * @param integer $id The id of the record to be disabled
     */
    public function disable($id)
    {
        $class = $this->model->find($id);
        $class->active = false;
        $class->save();
    }

    /**
     * enable a class record
     * @param integer $id The id of the record to be enabled
     */
    public function enable($id)
    {
        $class = $this->model->find($id);
        $class->active = true;
        $class->save();
    }
}
