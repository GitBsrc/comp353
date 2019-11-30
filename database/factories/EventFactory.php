<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Providers\Generator;

$factory->define(App\Event::class, function (Faker $faker) {

    $generator = new Generator();

    $start_date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years', $timezone = null);
    $days = $faker->biasedNumberBetween($min = 1, $max = 30, $function = 'sqrt');
    $end_date = $faker->dateTimeBetween($start_date, $start_date->format('Y-m-d H:i:s')." +$days days");

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'startDate' => $start_date,
        'endDate' => $end_date,
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
