<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\constraints::class, function (Faker $faker) {
    return [
        'constraint' => $faker->word,
    ];
});
