<?php

class FrequencyTableSeeder extends seeder {

	public function run()
	{
		DB::statement('DELETE FROM frequency');

		$frequencies = array(
			'26.975',
			'26.995',
			'27.025',
			'27.045',
			'27.075',
			'27.095',
			'27.125',
			'27.145',
			'27.175',
			'27.195',
			'27.225',
			'27.245',
			'27.255',
			'27.275'
		);

		foreach($frequencies as $frequency)
		{
			DB::insert("INSERT INTO frequency (name) VALUES ('" . $frequency . "')");
		}


	}
}
