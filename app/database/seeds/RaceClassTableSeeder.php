<?php

use HMCC\Repository\RaceEvent\RaceClassRepository;

class RaceClassTableSeeder extends seeder {

    protected $repository;

    public function __construct(RaceClassRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        DB::table('classes')->delete();

        $this->repository->store(['name' => '2 Wheel Drive Regional', 'active' => true]);
        $this->repository->store(['name' => '4 Wheel Drive Regional', 'active' => true]);
        $this->repository->store(['name' => 'Touring Car Club Meeting', 'active' => true]);
        $this->repository->store(['name' => 'Off Road Buggys Control Tyre', 'active' => true]);
        $this->repository->store(['name' => '1 12th Club Meeting', 'active' => true]);
        $this->repository->store(['name' => '1 8th Rallycross', 'active' => true]);
        $this->repository->store(['name' => 'Touring cars', 'active' => true]);
        $this->repository->store(['name' => '4 Wheel Drive', 'active' => true]);
        $this->repository->store(['name' => '2 Wheel Drive', 'active' => true]);
        $this->repository->store(['name' => '1 12th Scale', 'active' => true]);
        $this->repository->store(['name' => 'Mardave Class', 'active' => true]);
        $this->repository->store(['name' => 'Touring Cars 10.5 Turn', 'active' => true]);
        $this->repository->store(['name' => 'Touring Car 13.5 Turn', 'active' => true]);
        $this->repository->store(['name' => 'Recoil', 'active' => true]);
        $this->repository->store(['name' => 'Recoil Club Meeting', 'active' => true]);
        $this->repository->store(['name' => '1 18th club meeting', 'active' => true]);
        $this->repository->store(['name' => 'Touring Cars 19T Foam Class', 'active' => true]);
        $this->repository->store(['name' => 'Touring Car Rubber Class 19T + 27T', 'active' => true]);
        $this->repository->store(['name' => 'Touring Car Foams', 'active' => true]);
        $this->repository->store(['name' => 'Touring Car Modified', 'active' => true]);
        $this->repository->store(['name' => 'GT Class 1/10', 'active' => true]);
        $this->repository->store(['name' => 'Mini', 'active' => true]);
        $this->repository->store(['name' => 'Touring Cars 10.5 No Timing', 'active' => true]);
        $this->repository->store(['name' => '17.5 Timing', 'active' => true]);
        $this->repository->store(['name' => '17.5 Blinky', 'active' => true]);
        $this->repository->store(['name' => 'GT12 Class 1/12th', 'active' => true]);
        $this->repository->store(['name' => 'Open Buggys 1:10', 'active' => true]);
        $this->repository->store(['name' => 'Micro Buggies', 'active' => true]);
    }
}
