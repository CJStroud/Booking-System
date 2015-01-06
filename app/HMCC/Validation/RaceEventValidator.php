<?php namespace HMCC\Validation;

use Illuminate\Support\MessageBag;

class RaceEventValidator extends Validator
{
    protected $rules = ['name' => 'required',
                        'slug' => 'required|alpha_dash',
                        'event-date' => 'required',
                        'event-time' => 'required',
                        'close-time' => 'required',
                        'close-date' => 'required'];

    public function passes(Array $input)
    {
        $passes = parent::passes($input);

        if ($input['start_time'] < time())
        {
            $this->errors->add('event_date', 'The event date and time cannot in the past');
            $passes = false;
        }

        if ($input['close_time'] < time())
        {
            $this->errors->add('close_date', 'The close date and time cannot in the past');
            $passes = false;
        }
        else if($input['close_time'] > $input['start_time'])
        {
            $this->errors->add('close_date', 'The close date and time cannot be after the event');
            $passes = false;
        }


        if (empty($input['classes']))
        {
            $this->errors->add('classes', 'An event requires at least one class');

            $passes = false;
        }



        return $passes;
    }
}
