<?php

class UserTableSeeder extends seeder {

    public function run()
    {
        DB::statement('DELETE FROM user');

        $users = array (
            array(
                'forename' => 'Chris',
                'surname' => 'Stroud',
                'email' => 'chris.stroud@gmail.com',
                'password' => Hash::make('password' . 'chris.stroud@gmail.com'),
                'brca' => '213048',
                'isAdmin' => true
            ),
            array('forename' => 'Admin',
                  'surname' => 'User',
                  'email' => 'admin',
                  'password' => Hash::make('admin' . 'admin'),
                  'brca' => '4398985',
                  'isAdmin' => true
            ),
             array('forename' => 'Example',
                  'surname' => 'User',
                  'email' => 'example@mail.com',
                  'password' => Hash::make('password' . 'example@mail.com'),
                  'brca' => '834934',
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
