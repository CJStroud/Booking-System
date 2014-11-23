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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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

	public function login()
	{
		return $this->layout->content = View::make('user.login');
	}

	public function attemptLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		$result = DB::select('SELECT * FROM user WHERE email = ?',
						   array($email));

		$record = $result[0];
		$isMatch = Hash::check($password, $record->password);

		if ($isMatch)
		{
			$user = new User($record->forename, $record->surname, $record->email, $record->brca);
			Session::put('user', $user);

			return Redirect::route('event.index');
		}
		else
		{
			return Redirect::back()->withInput()->withErrors("The details you entered where incorrect");
		}
	}

	public function createAccount()
	{
		$rules = array(
			'email' => 'required|email',
			'password' => 'required|min:8'
		);

		$validator = Validator::make(
			Input::all(),
			$rules
		);

		$count = DB::select("SELECT COUNT(*) as count FROM user WHERE email = '" . Input::get('email') . "'");

		if ($validator->fails())
		{
			Redirect::back()->withInput()->withErrors($validator->messages());
		}
		else if($count > 0)
		{
			Redirect::back()->withInput()->withErrors("Email is already in use!");
		}
		else
		{
//			DB::insert('INSERT INTO user (forename, surname, email, password, secret, brca) VALUES (?, ?, ?, ?, ?, ?)',
//					   array();
		}

	}


}
