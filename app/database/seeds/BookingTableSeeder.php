<?php

class BookingTableSeeder extends seeder {

    public function run()
    {
        $bookings = array(
            array('eventId' => 1,
                'classId' => 4,
                'userId' => 1,
                'frequency1' => "40.665",
                'frequency2' => "40.675",
                'frequency3' => "40.685",
                'skill' => 4,
                'transponder' => 1234
            ),

            array('eventId' => 1,
                'classId' => 4,
                'userId' => 2,
                'frequency1' => "40.665",
                'frequency2' => "40.675",
                'frequency3' => "40.685",
                'skill' => 4,
                'transponder' => 1234
            )
        );


        foreach($bookings as $booking)
        {
            DB::insert('INSERT INTO booking (event_id, class_id, user_id, frequency_1, frequency_2, frequency_3, skill, transponder) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
                       array($booking['eventId'], $booking['classId'], $booking['userId'], $booking['frequency1'], $booking['frequency2'], $booking['frequency3'], $booking['skill'], $booking['transponder']));
        }

    }
}
