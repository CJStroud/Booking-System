<?php namespace HMCC\Validation;

class EventValidator extends Validator
{
	protected $rules = ['name' => 'required',
						'slug' => 'required|alpha_dash',
						'event-datetime' => 'required|date_format:"d/m/Y H:i"',
						'close-datetime' => 'required|date_format:"d/m/Y H:i"'];

	public function passes(Array $input)
	{
		$passes = parent::passes($input);

		$classes = json_decode($input['classes'], true);

		if (empty($classes))
		{
			$this->errors->add('classes', 'An event requires at least one class');

			return false;
		}

		return $passes;
	}
}
