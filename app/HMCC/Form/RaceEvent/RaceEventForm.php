<?php namespace HMCC\Form\RaceEvent;

use HMCC\Validation\RaceEvent\RaceEventValidator;
use HMCC\Repository\RaceEvent\RaceEventRepository;
use HMCC\Form\Form;

class RaceEventForm extends Form
{
    public function __construct(RaceEventRepository $repository, RaceEventValidator $validator)
    {
        parent::__construct($repository, $validator);
    }

    public function store(Array $inputs)
    {
        $inputs = $this->formatData($inputs);

        return parent::store($inputs);
    }
    
    public function update($id, Array $inputs)
    {
        $inputs = $this->formatData($inputs);
        
        return parent::update($id, $inputs);
    }
    
    
    private function formatData(Array $inputs)
    {
        $inputs['classes'] = json_decode($inputs['classes']);

        $inputs['start_time'] = $this::DateTimeToTimestamp($inputs['event-date'], $inputs['event-time']);
        $inputs['close_time'] = $this::DateTimeToTimestamp($inputs['close-date'], $inputs['close-time']);
        
        return $inputs;
    }

    public function dateTimeToTimestamp($strDate, $strTime)
    {
        $date = date_create($strDate);
        $time = date_create($strTime);
        $datetime = date_format($date, 'm/d/Y') . " " . date_format($time, 'H:i:s');

        return strtotime($datetime);
    }
    
    public function cancel($event_id)
    {
        $input = ['cancelled' => '1'];
        $this->repository->update($event_id, $input);
    }
}
