<?php namespace HMCC\Validation\Settings;

use HMCC\Validation\Validator;

class ProfileValidator extends Validator
{
  protected $rules = ['forename' => 'sometimes|required',
                      'surname'  => 'sometimes|required',
                      'email'    => 'sometimes|required|email|unique:users',
                      'brca'     => 'sometimes|required|numeric',
                      'skill'    => 'sometimes|required|numeric|between:0,10'];
}
