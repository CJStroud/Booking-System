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

		// $this->call('UserTableSeeder');
		$this->call('EventTableSeeder');
		$this->call('ClassTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('FrequencyTableSeeder');
		$this->call('BookingTableSeeder');
	}
}
