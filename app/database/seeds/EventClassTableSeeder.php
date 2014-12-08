<?php

class EventClassTableSeeder extends seeder {

    public function run()
    {

        $eventClasses = array(
                array('eventId' => 1,
                      'classId' => 4,
                      'maximum' => 5
                     ),

                array('eventId' => 2,
                      'classId' => 1,
                      'maximum' => 5
                     ),

                array('eventId' => 2,
                      'classId' => 2,
                      'maximum' => 5
                     )
        );


        foreach ($eventClasses as $eventClass)
        {
            DB::insert('INSERT INTO event_class (event_id, class_id, maximum) VALUES (?, ?, ?)',
                       array($eventClass['eventId'], $eventClass['classId'], $eventClass['maximum']));
        }

    }

}
