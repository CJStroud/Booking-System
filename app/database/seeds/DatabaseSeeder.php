<?php

class DatabaseSeeder extends Seeder {

	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		Eloquent::unguard();

		$this->call('RaceClassTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('FrequencyTableSeeder');
		$this->call('RaceEventTableSeeder');
	}
}
