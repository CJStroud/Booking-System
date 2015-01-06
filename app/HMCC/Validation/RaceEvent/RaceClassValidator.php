<?php namespace HMCC\Validation\RaceEvent;

use HMCC\Validation\Validator;

class RaceClassValidator extends Validator
{
  protected $rules = ['name' => 'required|unique:classes'];
}
