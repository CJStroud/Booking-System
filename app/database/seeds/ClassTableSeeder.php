<?php

class ClassTableSeeder extends seeder {

	public function run()
	{
		DB::delete('DELETE FROM class');

		$classes = array (
			'2 Wheel Drive Regional',
			'4 Wheel Drive Regional',
			'Touring Car Club Meeting',
			'Off Road Buggys Control Tyre',
			'1 12th Club Meeting',
			'1 8th Rallycross',
			'Touring cars',
			'4 Wheel Drive',
			'2 Wheel Drive',
			'1 12th Scale',
			'Mardave Class',
			'Touring Cars 10.5 Turn',
			'Touring Car 13.5 Turn',
			'Recoil',
			'Recoil Club Meeting',
			'1 18th club meeting',
			'Touring Cars 19T Foam Class',
			'Touring Car Rubber Class 19T + 27T',
			'Touring Car Foams',
			'Touring Car Modified',
			'GT Class 1/10',
			'Mini',
			'Touring Cars 10.5 No Timing',
			'17.5 Timing',
			'17.5 Blinky',
			'GT12 Class 1/12th',
			'Open Buggys 1:10',
			'Micro Buggies'
		);

		foreach($classes as $class)
		{
			DB::insert("INSERT INTO class (name, active) VALUES (?, true)", array($class));
		}
	}

}
