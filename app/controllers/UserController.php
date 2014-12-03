<?php

class UserController extends \BaseController {

	protected $layout = 'layouts.master';

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'forename' => 'required',
			'surname' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:6|confirmed',
			'password_confirmation' => 'required',
			'brca' => 'required|numeric'
		);

		$validator = Validator::make(
			Input::all(),
			$rules
		);

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$result = DB::select("SELECT COUNT(*) as count FROM user WHERE email = '" . Input::get('email') . "'");

		$count = $result[0]->count;

		if($count > 0)
		{
			return Redirect::back()->withInput()->withErrors("Email is being used by another account");
		}
		else
		{
			$forename = Input::get('forename');
			$surname = Input::get('surname');
			$email = Input::get('email');
			$plain_password = Input::get('password') . $email;
			$password = Hash::make($plain_password);
			$brca = Input::get('brca');

			DB::insert('INSERT INTO user (forename, surname, email, password, brca, isAdmin) VALUES (?, ?, ?, ?, ?, ?)',
					   array($forename, $surname, $email, $password, $brca, false));

			$result = DB::select('SELECT LAST_INSERT_ID() as id');
			$id = $result[0]->id;

			$user = new User($id, $forename, $surname, $email, $brca, false);
			Session::put('user', $user);

			return Redirect::route('event.index');
		}

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function signUp()
	{
		return $this->layout->content = View::make('user.create');
	}

	public function login()
	{
		return $this->layout->content = View::make('user.login');
	}

	public function attemptLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password') . $email;

		$result = DB::select('SELECT * FROM user WHERE email = ?',
						   array($email));

		if (empty($result))
		{
			return Redirect::back()->withInput()->withErrors("The details you entered where incorrect");
		}

		$record = $result[0];
		$isMatch = Hash::check($password, $record->password);

		if ($isMatch)
		{
			$user = new User($record->id, $record->forename, $record->surname, $record->email, $record->brca, $record->isAdmin);
			Session::put('user', $user);

			return Redirect::route('event.index');
		}
		else
		{
			return Redirect::back()->withInput()->withErrors("The details you entered where incorrect");
		}
	}

	public function signOut()
	{
		Session::put('user', null);

		return Redirect::back()->withInput();
	}



}
