<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EventRatesSeeder::class,
            EventSeeder::class,
            UserTypeSeeder::class,
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            EventMembersTableSeeder::class
            EventMemberTypeTableSeeder::class,
        ]);
    }
}
