<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Providers\Generator;

$factory->define(App\Event::class, function (Faker $faker) {

    $generator = new Generator();

    $start_date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years', $timezone = null);
    $days = $faker->biasedNumberBetween($min = 1, $max = 30, $function = 'sqrt');
    $end_date = $faker->dateTimeBetween($start_date, $start_date->format('Y-m-d H:i:s')." +$days days");
    $recurrence = $faker->biasedNumberBetween($min = 0, $max = 4, $function = 'sqrt');
    $original_discount =  $faker->biasedNumberBetween($min = 0, $max = 10, $function = 'sqrt');
    $type = $generator->generate_random_type();
    $bandwidth = $faker->randomFloat($nbMaxDecimals = 2, $min = 86.92, $max = 105);
    $storage = $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 100);

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'startDate' => $start_date,
        'endDate' => $end_date,
        'location' => $faker->address,
        'recurrence' => $recurrence,
        'status' => $generator->generate_status($start_date, $end_date),
        'type' => $type,
        'discount' => $generator->generate_discount($recurrence, $original_discount),
        'price' => $generator->generate_price($type, 25) + $generator->add_config_rates($storage, $bandwidth, 4, 5),
        'bandwidth' => $bandwidth,
        'storage' => $storage,
        'event_rates_id' => 1,
    ];
});
