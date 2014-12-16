<?php namespace HMCC\Validation;

class RaceClassValidator extends Validator
{
	protected $rules = ['name' => 'required|unique:classes'];
}
