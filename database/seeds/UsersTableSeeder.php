<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Marlin Jayasekera',
            'email' => 'marlin.j.281@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Karl Chami',
            'email' => 'karl@gmail.com',
            'password' => bcrypt('karl12345'),
        ]);
    }
}