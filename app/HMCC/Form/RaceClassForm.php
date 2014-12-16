<?php namespace HMCC\Form;

use HMCC\Validation\RaceClassValidator;
use HMCC\Repository\RaceClassRepository;

class RaceClassForm extends Form
{

	public function __construct(RaceClassRepository $repository, RaceClassValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}
}
