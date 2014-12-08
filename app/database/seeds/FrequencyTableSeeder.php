<?php

class FrequencyTableSeeder extends seeder {

    public function run()
    {
        DB::statement('DELETE FROM frequency');

        $frequencies = array(
            '26.975 Black or Grey/Brown',
            '26.995 Brown',
            '27.025 Brown/Red',
            '27.045 Red',
            '27.075 Red/Orange',
            '27.095 Orange',
            '27.125 Orange/Yellow',
            '27.145 Yellow',
            '27.175 Yellow/Green',
            '27.195 Green',
            '27.225 Green/Blue',
            '27.245 Blue',
            '27.255 Blue (as well)',
            '27.275 White or Purple',
            '40.665',
            '40.675',
            '40.685',
            '40.695',
            '40.705',
            '40.715',
            '40.725',
            '40.735',
            '40.745',
            '40.755',
            '40.765',
            '40.775',
            '40.785',
            '40.795',
            '40.815',
            '40.825',
            '40.835',
            '40.845',
            '40.855',
            '40.865',
            '40.875',
            '40.885',
            '40.895',
            '40.905',
            '40.915',
            '40.925',
            '40.935',
            '40.945',
            '40.955',
            '40.965',
            '40.975',
            '40.985',
            '40.995',
        );

        foreach($frequencies as $frequency)
        {
            DB::insert("INSERT INTO frequency (name) VALUES ('" . $frequency . "')");
        }


    }
}
