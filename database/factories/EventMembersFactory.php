<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\EventMembers::class, function (Faker $faker) {
    return [
        'event_id' => function () {
            return factory(App\Event::class)->create()->id;
        },
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'member_type_id' => $faker->randomNumber(),
    ];
});
