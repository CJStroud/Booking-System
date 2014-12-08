<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        // $this->call('UserTableSeeder');
        $this->call('ClassTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('FrequencyTableSeeder');
        $this->call('EventTableSeeder');
        $this->call('EventClassTableSeeder');
        $this->call('BookingTableSeeder');
    }
}
