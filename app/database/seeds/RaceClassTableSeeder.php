<?php

use HMCC\Repository\RaceClassRepository;

class RaceClassTableSeeder extends seeder {

	protected $repository;

	public function __construct(RaceClassRepository $repository)
	{
		$this->repository = $repository;
	}

	public function run()
	{
		DB::table('classes')->delete();

		$this->repository->store(['name' => '2 Wheel Drive Regional']);
		$this->repository->store(['name' => '4 Wheel Drive Regional']);
		$this->repository->store(['name' => 'Touring Car Club Meeting']);
		$this->repository->store(['name' => 'Off Road Buggys Control Tyre']);
		$this->repository->store(['name' => '1 12th Club Meeting']);
		$this->repository->store(['name' => '1 8th Rallycross']);
		$this->repository->store(['name' => 'Touring cars']);
		$this->repository->store(['name' => '4 Wheel Drive']);
		$this->repository->store(['name' => '2 Wheel Drive']);
		$this->repository->store(['name' => '1 12th Scale']);
		$this->repository->store(['name' => 'Mardave Class']);
		$this->repository->store(['name' => 'Touring Cars 10.5 Turn']);
		$this->repository->store(['name' => 'Touring Car 13.5 Turn']);
		$this->repository->store(['name' => 'Recoil']);
		$this->repository->store(['name' => 'Recoil Club Meeting']);
		$this->repository->store(['name' => '1 18th club meeting']);
		$this->repository->store(['name' => 'Touring Cars 19T Foam Class']);
		$this->repository->store(['name' => 'Touring Car Rubber Class 19T + 27T']);
		$this->repository->store(['name' => 'Touring Car Foams']);
		$this->repository->store(['name' => 'Touring Car Modified']);
		$this->repository->store(['name' => 'GT Class 1/10']);
		$this->repository->store(['name' => 'Mini']);
		$this->repository->store(['name' => 'Touring Cars 10.5 No Timing']);
		$this->repository->store(['name' => '17.5 Timing']);
		$this->repository->store(['name' => '17.5 Blinky']);
		$this->repository->store(['name' => 'GT12 Class 1/12th']);
		$this->repository->store(['name' => 'Open Buggys 1:10']);
		$this->repository->store(['name' => 'Micro Buggies']);
	}
}
