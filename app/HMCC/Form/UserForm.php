<?php namespace HMCC\Form;

use HMCC\Validation\UserValidator;
use HMCC\Repository\UserRepository;

class UserForm extends Form
{
	public function __construct(UserRepository $repository, UserValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function store(Array $inputs)
	{
		$secret = str_random(15);
		$inputs['secret'] = $secret;

		$inputs['password'] = Hash::make($input['password'] . $secret);

		return parent::store($inputs);
	}
}
