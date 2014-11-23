<?php

class ClassTableSeeder extends seeder {

	public function run()
	{
		DB::table('class')->delete();

		$classes = array (
			['name' => '2 Wheel Drive Regional'],
			['name' => '4 Wheel Drive Regional'],
			['name' => 'Touring Car Club Meeting'],
			['name' => 'Off Road Buggys Control Tyre'],
			['name' => '1 12th Club Meeting'],
			['name' => '1 8th Rallycross'],
			['name' => 'Touring cars'],
			['name' => '4 Wheel Drive'],
			['name' => '2 Wheel Drive'],
			['name' => '1 12th Scale'],
			['name' => 'Mardave Class'],
			['name' => 'Touring Cars 10.5 Turn'],
			['name' => 'Touring Car 13.5 Turn'],
			['name' => 'Recoil'],
			['name' => 'Recoil Club Meeting'],
			['name' => '1 18th club meeting'],
			['name' => 'Touring Cars 19T Foam Class'],
			['name' => 'Touring Car Rubber Class 19T + 27T'],
			['name' => 'Touring Car Foams'],
			['name' => 'Touring Car Modified'],
			['name' => 'GT Class 1/10'],
			['name' => 'Mini'],
			['name' => 'Touring Cars 10.5 No Timing'],
			['name' => '17.5 Timing'],
			['name' => '17.5 Blinky'],
			['name' => 'GT12 Class 1/12th'],
			['name' => 'Open Buggys 1:10'],
			['name' => 'Micro Buggies']
		);

		foreach($classes as $class)
		{
			DB::table('class')->insert($class);
		}
	}

}
