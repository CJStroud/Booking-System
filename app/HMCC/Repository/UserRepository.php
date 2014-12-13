<?php namespace HMCC\Repository;

use User;
use Hash;

class UserRepository extends Repository
{
	public function __construct(User $user)
	{
		$this->model = $user;
	}

	public function store($data)
	{
		$record = new $this->model;
		$record->forename = $data['forename'];
		$record->surname = $data['surname'];
		$record->email = $data['email'];
		$record->password = $data['password'];
		$record->secret = $data['secret'];
		$record->brca = $data['brca'];

		return $record->save();
	}
}
