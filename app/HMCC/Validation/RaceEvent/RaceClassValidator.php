<?php namespace HMCC\Validation\RaceEvent;

use HMCC\Validation\Validator;

class RaceClassValidator extends Validator
{
    protected $rules = ['name' => 'required|unique:classes'];

    public function passes(Array $input)
    {
        $newRules = ',name';

        if ( isset( $input['id'] ) ) {
            $newRules .= ',' . $input['id'];
        }

        $this->rules['name'] .= $newRules;

        parent::passes($input);
    }
}
