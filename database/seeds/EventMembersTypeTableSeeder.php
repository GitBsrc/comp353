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
        DB::table('event_member_type')->insert([
            'type' => 'participant'
        ]);

        DB::table('event_member_type')->insert([
            'type' => 'manager'
        ]);

        DB::table('event_member_type')->insert([
            'type' => 'admin'
        ]);
    }
}
