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
				'password' => Hash::make('password' . 'chris.stroud@gmail.com'),
				'brca' => '213048',
				'isAdmin' => true
			),
			array('forename' => 'test',
				  'surname' => 'mctesty',
				  'email' => 'test@mail.com',
				  'password' => Hash::make('password' . 'test@mail.com'),
				  'brca' => '4398985',
				  'isAdmin' => false

			)
		);

		foreach($users as $user)
		{
			DB::statement('INSERT INTO user (forename, surname, email, password, brca, isAdmin) VALUES (?, ?, ?, ?, ?, ?)',
				 array($user['forename'], $user['surname'], $user['email'], $user['password'], $user['brca'], $user['isAdmin']));
		}
	}

}
