<?php namespace HMCC\Validation;

class UserValidator extends Validator
{
	protected $rules = ['forename' => 'required',
			  'surname' => 'required',
			  'email' => 'required|email|unique:users',
			  'password' => 'required|min:6|confirmed',
			  'brca' => 'required|numeric'
			 ];
}
