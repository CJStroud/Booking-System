<?php namespace HMCC\Form;

use HMCC\Validation\ClassValidator;
use HMCC\Repository\ClassRepository;

class ClassForm extends Form
{

	public function __construct(ClassRepository $repository, ClassValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}
}
