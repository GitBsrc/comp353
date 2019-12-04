<?php

use Illuminate\Database\Seeder;

class EventMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_members')->insert([
            'event_id' => 1,
            'user_id' => 1,
            'member_type_id' => 3
        ]);

        DB::table('event_members')->insert([
            'event_id' => 1,
            'user_id' => 2,
            'member_type_id' => 1
        ]);

        DB::table('event_members')->insert([
            'event_id' => 1,
            'user_id' => 3,
            'member_type_id' => 2
        ]);
    }
}
