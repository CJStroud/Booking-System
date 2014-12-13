<?php namespace HMCC\Validation;

class BookingValidator extends Validator
{
	protected $rules = ['transponder' => 'required|numeric'];

	public function passes(Array $input)
	{
		// Todo Validation checks
		// user has already booked
		// event is full
		// event is locked
	}
}

