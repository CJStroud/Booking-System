<?php

class BookingTableSeeder extends seeder {

	public function run()
	{
		$bookings = array(
			array('eventId' => 1,
				'classId' => 4,
				'userId' => 1,
				'frequency1' => 1,
				'frequency2' => 2,
				'frequency3' => 3,
				'skill' => 4,
				'transponder' => 1234
			)
		);

		foreach($bookings as $booking)
		{
			DB::insert('INSERT INTO booking (event_id, class_id, user_id, frequency_1_id, frequency_2_id, frequency_3_id, skill, transponder) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
					   array($booking['eventId'], $booking['classId'], $booking['userId'], $booking['frequency1'], $booking['frequency2'], $booking['frequency3'], $booking['skill'], $booking['transponder']));
		}

	}
}
