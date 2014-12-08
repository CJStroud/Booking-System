<?php

class EventClassTableSeeder extends seeder {

    public function run()
    {
        $eventClasses = array(
                array('eventId' => 1,
                      'classId' => 4,
                     )
        );


        foreach ($eventClasses as $eventClass)
        {
            DB::insert('INSERT INTO event_class (event_id, class_id) VALUES (?, ?)',
                       array($eventClass['eventId'], $eventClass['classId']));
        }

    }

}
