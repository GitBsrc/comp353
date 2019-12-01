<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'startDate' => $faker->dateTime(),
        'endDate' => $faker->dateTime(),
        'location' => $faker->word,
        'recurrence' => $faker->randomNumber(),
        'status' => $faker->word,
        'type' => $faker->word,
        'discount' => $faker->randomFloat(2, 0, 100),
        'price' => $faker->randomFloat(2, 0, 1000),
        'bandwidth' => $faker->randomFloat(2, 0, 1000),
        'storage' => $faker->randomNumber(),
    ];
});
