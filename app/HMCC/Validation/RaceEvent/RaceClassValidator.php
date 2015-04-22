<?php namespace HMCC\Validation\RaceEvent;

use HMCC\Validation\Validator;

class RaceClassValidator extends Validator
{
    protected $rules = ['name' => 'required|unique:classes'];

    public function passes(Array $input)
    {
        $this->rules['name'] .= ',name,' . $input['id'];
        parent::passes($input);
    }
}
