<?php

class UserController extends \BaseController {

	protected $layout = 'layouts.master';

	public function store()
	{
		// create rules for input validation
		$rules = array(
			'forename' => 'required',
			'surname' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:6|confirmed',
			'password_confirmation' => 'required',
			'brca' => 'required|numeric'
		);

		// validate inputs against rules
		$validator = Validator::make(
			Input::all(),
			$rules
		);

		// if validation does not pass
		if ($validator->fails())
		{
			// show user the errors
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		// count the number of users who use the email selected
		$result = DB::select("SELECT COUNT(*) as count FROM user WHERE email = '" . Input::get('email') . "'");

		$count = $result[0]->count;

		// count bigger than 0 means that email is already in user, return the error to the user
		($count > 0)
		{
			return Redirect::back()->withInput()->withErrors("Email is being used by another account");
		}
		else
		{
			// get data from input
			$forename = Input::get('forename');
			$surname = Input::get('surname');
			$email = Input::get('email');
			$plain_password = Input::get('password') . $email;
			$password = Hash::make($plain_password);
			$brca = Input::get('brca');

			// create new user record in database
			DB::insert('INSERT INTO user (forename, surname, email, password, brca, isAdmin) VALUES (?, ?, ?, ?, ?, ?)',
					   array($forename, $surname, $email, $password, $brca, false));

			//get the user id
			$result = DB::select('SELECT LAST_INSERT_ID() as id');
			$id = $result[0]->id;

			// sign the user in by adding them to session
			$user = new User($id, $forename, $surname, $email, $brca, false);
			Session::put('user', $user);

			return Redirect::route('event.index');
		}

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
