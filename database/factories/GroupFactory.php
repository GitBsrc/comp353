<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'groupName' => $faker->word,
        'groupDescription' => $faker->word,
        'groupIsPublic' => $faker->word,
    ];
});
