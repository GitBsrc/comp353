<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => "George's Wedding",
            'description' => "Hello everyone, you are invited to my wedding!!!",
            'startDate' => "2019-12-06 03:02:01",
            'endDate' => "2019-12-08 04:02:01",
            'location' => "Chateau crystal",
            'recurrence' => 0,
            'status' => "Upcoming",
            'type' => "Non-Profit",
            'discount' => 0,
            'price' => 0,
            'storage' => 50,
            'bandwidth' => 86.92,
            'event_rates_id' => 1
        ]);

        DB::table('events')->insert([
            'name' => "Study Session",
            'description' => "Study comp353 together",
            'startDate' => "2019-12-01 16:02:01",
            'endDate' => "2019-12-02 14:02:01",
            'location' => "Chateau crystal",
            'recurrence' => 0,
            'status' => "Archived",
            'type' => "Profit",
            'discount' => 3,
            'price' => 22,
            'storage' => 50,
            'bandwidth' => 86.92,
            'event_rates_id' => 1
        ]);

        DB::table('events')->insert([
            'name' => "Anissas first communion",
            'description' => "Study comp353 together",
            'startDate' => "2019-12-17 09:02:01",
            'endDate' => "2019-12-26 14:02:01",
            'location' => "Church Grey Nuns",
            'recurrence' => 0,
            'status' => "Upcoming",
            'type' => "Non-Profit",
            'discount' => 0,
            'price' => 0,
            'storage' => 50,
            'bandwidth' => 86.92,
            'event_rates_id' => 1
        ]);

        DB::table('events')->insert([
            'name' => "Business meeting",
            'description' => "In this meeting we will discuss the work meeting.",
            'startDate' => "2019-12-05 09:02:01",
            'endDate' => "2019-12-06 14:02:01",
            'location' => "Conference",
            'recurrence' => 0,
            'status' => "In Progress",
            'type' => "Profit",
            'discount' => 4,
            'price' => 40,
            'storage' => 50,
            'bandwidth' => 86.92,
            'event_rates_id' => 1
        ]);
    }
}
