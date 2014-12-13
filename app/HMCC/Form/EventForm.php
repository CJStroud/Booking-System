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

	public function store(Array $inputs)
	{
		$inputs['classes'] = json_decode($inputs['classes']);

		return parent::store($inputs);
	}
}
