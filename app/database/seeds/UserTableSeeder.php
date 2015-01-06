<?php

use HMCC\Repository\User\UserRepository;

class UserTableSeeder extends seeder {

  protected $repository;

  public function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run()
  {
    DB::table('users')->delete();

    $secret = str_random(15);
    $user = array(
      'forename' => 'Chris',
      'surname' => 'Stroud',
      'email' => 'chris.stroud@gmail.com',
      'password' => 'password',
      'secret' => $secret,
      'brca' => '213048',
      'transponder' => '1273823',
      'skill' => 5,
      'is_admin' => true
    );
    $this->repository->store($user);

    $secret = str_random(15);
    $user = array(
      'forename' => 'Andy',
      'surname' => 'Bird',
      'email' => 'andy.bird@gmail.com',
      'password' => Hash::make('password' . $secret),
      'secret' => $secret,
      'brca' => '9382372',
      'transponder' => '93047563',
      'skill' => 8,
      'is_admin' => false,
    );
    $this->repository->store($user);

  }

}
