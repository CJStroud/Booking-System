<?php namespace HMCC\Validation;

use Illuminate\Validation\Factory;

abstract class Validator implements ValidatorInterface {

	protected $rules = array();

	protected $messages = array();

	public $errors;

	/**
	 * Contructor for the validator
	 * @param Factory $factory This is used to create the laravel validator object
	 */
	public function __construct(Factory $factory)
	{
		$this->factory = $factory;
	}

	/**
	 * Checks to see if the inputs pass the validation
	 * @param   Array   $input An array of all the inputs to be validated
	 * @returns Boolean Returns TRUE or FALSE depending on if it has passed.
	 */
	public function passes(Array $input)
	{
		$validator = $this->factory->make($input, $this->rules, $this->messages);

		if($validator->fails($input)) {

			$this->errors = $validator->messages();

			return false;

		}

		return true;
	}

}
