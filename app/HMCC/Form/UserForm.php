<?php namespace HMCC\Form;

use HMCC\Validation\UserValidator;
use HMCC\Repository\UserRepository;
use Hash;
use Auth;

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

		return parent::store($inputs);
	}

	public function checkLogin($email, $password)
	{
		$secret = $this->repository->getSecret($email);

		// append secret to password
		$password =  $password . $secret;


		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
			return true;
		}

		return false;
	}
}
