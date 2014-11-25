<?php

class EventTableSeeder extends seeder {

	public function run()
	{
		DB::delete('DELETE FROM event');

		$date = time();
		$closeDate = time();

		$hour = (60*60);

		$events = array (
					array('name' => 'Winter Series 2014 round 5',
							'slug' => 'winter-series-2014-round-5',
							'event_datetime' => strtotime('last friday') + ($hour * 19.5),
							'close_datetime' => strtotime('last friday') + ($hour * 17)),

					array('name' => 'Winter Series 2014 round 6',
							'slug' => 'winter-series-2014-round-6',
							'event_datetime' => strtotime('next friday') + ($hour * 19.5),
							'close_datetime' => strtotime('next friday') + ($hour * 17)),

					array('name' => 'Winter Series 2014 round 7',
							'slug' => 'winter-series-2014-round-7',
							'event_datetime' => strtotime('next friday') + ($hour * 19.5),
							'close_datetime' => strtotime('next friday') + ($hour * 17))
						 );

		foreach($events as $event)
		{
			DB::insert('INSERT INTO event (name, slug, event_datetime, close_datetime) VALUES (?, ?, ?, ?)', array($event['name'], $event['slug'], $event['event_datetime'], $event['close_datetime']));
		}
	}

}
