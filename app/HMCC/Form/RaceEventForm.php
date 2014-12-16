<?php namespace HMCC\Form;

use HMCC\Validation\RaceEventValidator;
use HMCC\Repository\RaceEventRepository;

class RaceEventForm extends Form
{
	public function __construct(RaceEventRepository $repository, RaceEventValidator $validator)
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
