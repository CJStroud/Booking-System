<?php

class UserTableSeeder extends seeder {

	public function run()
	{
		DB::statement('DELETE FROM user');

		$users = array (
			array(
				'forename' => 'chris',
				'surname' => 'stroud',
				'email' => 'chris.stroud@gmail.com',
				'password' => Hash::make('password'),
				'secret' => 'secret',
				'brca' => '213048'
			),
			array('forename' => 'test',
				  'surname' => 'mctesty',
				  'email' => 'test@mail.com',
				  'password' => Hash::make('password'),
				  'secret' => 'secret',
				  'brca' => '4398985'

			)
		);

		foreach($users as $user)
		{
			DB::statement('INSERT INTO user (forename, surname, email, password, secret, brca) VALUES (?, ?, ?, ?, ?, ?)',
				 array($user['forename'], $user['surname'], $user['email'], $user['password'], $user['secret'], $user['brca']));
		}
	}

}
