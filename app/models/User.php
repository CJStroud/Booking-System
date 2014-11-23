<?php

class User {

	protected $forename;
	protected $surname;
	protected $email;
	protected $brca;

	public function __construct($forename, $surname, $email, $brca)
	{
		$this->forename = $forename;
		$this->surname = $surname;
		$this->email = $email;
		$this->brca = $brca;
	}

	public function Name()
	{
		return $forename . " " . $surname;
	}
}
