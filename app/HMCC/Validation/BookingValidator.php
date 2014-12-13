<?php namespace HMCC\Validation;

class BookingValidator extends Validator
{
	protected $rules = ['transponder' => 'required|numeric'];
}
