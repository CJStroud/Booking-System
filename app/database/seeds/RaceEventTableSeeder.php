<?php

use HMCC\Repository\RaceEvent\RaceEventRepository;

class RaceEventTableSeeder extends seeder {

  protected $repository;

  public function __construct(RaceEventRepository $repository)
  {
    $this->repository = $repository;
  }

  public function run()
  {
    DB::table('events')->delete();

    $hour = 60*60;

    $classes = [new stdClass()];
    
    $classes[0]->id = 1;
    $classes[0]->limit = 20;
    
    $event = array(
      'name' => 'Test Event 1',
      'slug' => 'test-event-1',
      'start_time' => strtotime('last friday') + ($hour * 19.5),
      'close_time' => strtotime('last friday') + ($hour * 17),
      'classes' => $classes
    );

    $this->repository->store($event);

    $classes = [new stdClass()];
    
    $classes[0]->id = 2;
    $classes[0]->limit = 20;

    $event = array(
      'name' => 'Test Event 2',
      'slug' => 'test-event-2',
      'start_time' => strtotime('next friday') + ($hour * 19.5),
      'close_time' => strtotime('next friday') + ($hour * 17),
      'classes' => $classes
    );

    $this->repository->store($event);
  }

}
