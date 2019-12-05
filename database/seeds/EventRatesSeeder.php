<?php

use Illuminate\Database\Seeder;

class EventRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_rates')->insert([
            'event' => 15,
            'bandwidth' => 5,
            'storage' => 8,
            'event_extension' => 7,
            'event_recurrence' => 10,
            'event_recurrence_discount' => 4
        ]);
    }
}
