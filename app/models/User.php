<?php

class User {

	public $id;
	public $forename;
	public $surname;
	public $email;
	public $brca;
	public $isAdmin;

	public function __construct($id, $forename, $surname, $email, $brca, $isAdmin)
	{
		$this->id = $id;
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
