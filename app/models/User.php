<?php

class User {

	public $forename;
	public $surname;
	public $email;
	public $brca;
	public $isAdmin;

	public function __construct($forename, $surname, $email, $brca, $isAdmin)
	{
		$this->forename = $forename;
		$this->surname = $surname;
		$this->email = $email;
		$this->brca = $brca;
		$this->isAdmin = $isAdmin;
	}

	public function Name()
	{
		return $this->forename . " " . $this->surname;
	}
}
