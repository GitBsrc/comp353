<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\GroupMembers::class, function (Faker $faker) {
    return [
        'userID' => $faker->randomNumber(),
        'groupID' => $faker->randomNumber(),
        'isLeader' => $faker->word,
        'joinDate' => $faker->dateTime(),
        'group_id' => function () {
            return factory(App\Group::class)->create()->id;
        },
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
