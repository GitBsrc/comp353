<?php

use Illuminate\Database\Seeder;

class EventMembersTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_member_types')->insert([
            'type' => 'participant'
        ]);

        DB::table('event_member_types')->insert([
            'type' => 'manager'
        ]);

        DB::table('event_member_types')->insert([
            'type' => 'admin'
        ]);
    }
}
