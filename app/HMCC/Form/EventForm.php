<?php namespace HMCC\Form;

use HMCC\Validation\EventValidator;
use HMCC\Repository\EventRepository;

class EventForm extends Form
{

	public function __construct(EventRepository $repository, EventValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}
}
