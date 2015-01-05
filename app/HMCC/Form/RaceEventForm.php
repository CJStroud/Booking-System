<?php namespace HMCC\Form;

use HMCC\Validation\RaceEventValidator;
use HMCC\Repository\RaceEventRepository;

class RaceEventForm extends Form
{
    public function __construct(RaceEventRepository $repository, RaceEventValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store(Array $inputs)
    {
        $inputs['classes'] = json_decode($inputs['classes']);

        $inputs['event_datetime'] = $this::DateTimeToTimestamp($inputs['event-date'], $inputs['event-time']);
        $inputs['close_datetime'] = $this::DateTimeToTimestamp($inputs['close-date'], $inputs['close-time']);

        return parent::store($inputs);
    }

    public function DateTimeToTimestamp($strDate, $strTime)
    {
        $date = date_create($strDate);
        $time = date_create($strTime);
        $datetime = date_format($date, 'm/d/Y') . " " . date_format($time, 'H:i:s');

        return strtotime($datetime);
    }
}
