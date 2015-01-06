<?php

use HMCC\Repository\Booking\FrequencyRepository;

class FrequencyTableSeeder extends seeder {

  protected $repository;

  public function __construct(FrequencyRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run()
  {
    DB::table('frequencies')->delete();

    $this->repository->store(['name' => '2.4 Ghz']);
    $this->repository->store(['name' => '26.975 Black or Grey/Brown']);
    $this->repository->store(['name' => '26.995 Brown']);
    $this->repository->store(['name' => '27.025 Brown/Red']);
    $this->repository->store(['name' => '27.045 Red']);
    $this->repository->store(['name' => '27.075 Red/Orange']);
    $this->repository->store(['name' => '27.095 Orange']);
    $this->repository->store(['name' => '27.125 Orange/Yellow']);
    $this->repository->store(['name' => '27.145 Yellow']);
    $this->repository->store(['name' => '27.175 Yellow/Green']);
    $this->repository->store(['name' => '27.195 Green']);
    $this->repository->store(['name' => '27.225 Green/Blue']);
    $this->repository->store(['name' => '27.245 Blue']);
    $this->repository->store(['name' => '27.255 Blue (as well)']);
    $this->repository->store(['name' => '27.275 White or Purple']);
    $this->repository->store(['name' => '40.665']);
    $this->repository->store(['name' => '40.675']);
    $this->repository->store(['name' => '40.685']);
    $this->repository->store(['name' => '40.695']);
    $this->repository->store(['name' => '40.705']);
    $this->repository->store(['name' => '40.715']);
    $this->repository->store(['name' => '40.725']);
    $this->repository->store(['name' => '40.735']);
    $this->repository->store(['name' => '40.745']);
    $this->repository->store(['name' => '40.755']);
    $this->repository->store(['name' => '40.765']);
    $this->repository->store(['name' => '40.775']);
    $this->repository->store(['name' => '40.785']);
    $this->repository->store(['name' => '40.795']);
    $this->repository->store(['name' => '40.815']);
    $this->repository->store(['name' => '40.825']);
    $this->repository->store(['name' => '40.835']);
    $this->repository->store(['name' => '40.845']);
    $this->repository->store(['name' => '40.855']);
    $this->repository->store(['name' => '40.865']);
    $this->repository->store(['name' => '40.875']);
    $this->repository->store(['name' => '40.885']);
    $this->repository->store(['name' => '40.895']);
    $this->repository->store(['name' => '40.905']);
    $this->repository->store(['name' => '40.915']);
    $this->repository->store(['name' => '40.925']);
    $this->repository->store(['name' => '40.935']);
    $this->repository->store(['name' => '40.945']);
    $this->repository->store(['name' => '40.955']);
    $this->repository->store(['name' => '40.965']);
    $this->repository->store(['name' => '40.975']);
    $this->repository->store(['name' => '40.985']);
    $this->repository->store(['name' => '40.995']);
  }
}
