<?php namespace HMCC\Validation;

class ClassValidator extends Validator
{
	protected $rules = ['name' => 'required|unique:classes'];
}
