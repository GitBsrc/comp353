<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'groupName' => $faker->word,
        'groupDescription' => $faker->word,
        'groupIsPublic' => $faker->numberBetween($min = 0, $max = 1),
        'eventID' => factory(App\Event::class)->create()->id,
    ];
});
