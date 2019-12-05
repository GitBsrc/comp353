<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group')->insert([
            'groupName' => 'Comp353 Group',
            'groupDescription' => 'a great group with great people!',
            'groupIsPublic' => 1
        ]);

        DB::table('group')->insert([
            'groupName' => 'George\'s Wedding\'s Group',
            'eventID' => 1,
            'groupDescription' => 'a group for goerge\'s friends coming to his wedding!',
            'groupIsPublic' => 0
        ]);

        DB::table('group')->insert([
            'groupName' => 'Charity4Life',
            'groupDescription' => 'do you like charity? this is the group for you!',
            'groupIsPublic' => 1
        ]);
    }
}
