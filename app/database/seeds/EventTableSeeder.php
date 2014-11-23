<?php

class EventTableSeeder extends seeder {

	public function run()
	{
		DB::table('event')->delete();

		$date = new DateTime();
		$closeDate = new DateTime();

		$events = array (
					array('name' => 'Winter Series 2014 round 6',
						'slug' => 'winter-series-2014-round-6',
						'event_datetime' => $date->getTimestamp(),
						'close_datetime' => $closeDate->getTimestamp()),

					array('name' => 'Winter Series 2014 round 7',
						'slug' => 'winter-series-2014-round-7',
						'event_datetime' => $date->getTimestamp(),
						'close_datetime' => $closeDate->getTimestamp())
		);

		foreach($events as $event)
		{
			DB::table('event')->insert($event);
		}
	}

}
