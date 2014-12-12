<?php

use HMCC\Form\UserForm;

class UserController extends \BaseController {

	protected $layout = 'layouts.master';

	/**
	 * @var UserForm
	 */
	protected $form;

	public function __construct(UserForm $form)
	{
		$this->form = $form;
	}

	/**
	 * Stores the new user record
	 * @returns Redirect Returns a laravel redirect object
	 */
	public function store()
	{
		$this->form->store(Input::all());

		return Redirect::route('event.index');
	}

	public function signUp()
	{
		// return user sign up page
		return $this->layout->content = View::make('user.create');
	}

	public function login()
	{
		// return user login page
		return $this->layout->content = View::make('user.login');
	}

	public function attemptLogin()
	{
		$email = Input::get('email');

		// append email to password
		$password = Input::get('password') . $email;

		// find any users with the entered email
		$result = DB::select('SELECT * FROM user WHERE email = ?',
							array($email));

		// inform the user that the details they entered were incorrect
		if (empty($result))
		{
			return Redirect::back()->withInput()->withErrors("The details you entered where incorrect");
		}

		// encrypt password and see if it matches the one from the database
		$record = $result[0];
		$isMatch = Hash::check($password, $record->password);

		// if both the email and password match then then log the user in and save details to session
		if ($isMatch)
		{
			$user = new User($record->id, $record->forename, $record->surname, $record->email, $record->brca, $record->isAdmin);
			Session::put('user', $user);

			return Redirect::route('event.index');
		}
		else
		{
			// inform the user that the details entered were incorrect
			return Redirect::back()->withInput()->withErrors("The details you entered where incorrect");
		}
	}

	public function signOut()
	{
		// blank out the user in session to log the user out
		Session::put('user', null);

		return Redirect::back()->withInput();
	}



}
