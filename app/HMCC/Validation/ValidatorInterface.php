<?php namespace HMCC\Validation;

interface ValidatorInterface
{
	/**
	 * Checks to see if the inputs pass the validation
	 * @param Array $inputs An array of all the inputs for the validation
	 */
	public function passes(Array $inputs);
}
