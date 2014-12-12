<?php namespace HMCC\Form;

use Exception;
use Illumiate\Support\MessageBag;

class FormException extends Exception
{

	public function __construct($messages)
	{
		$this->messages = $messages;
	}

	/**
	 * Returns the messages of the FormException
	 * @returns Array Returns an array of all the messages.
	 */
	public function getMessages()
	{
		return $this->messages;
	}

}
