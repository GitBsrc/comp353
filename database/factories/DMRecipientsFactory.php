<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\dmrecipients::class, function (Faker $faker) {
    return [
        'group_id' => function () {
            return factory(App\Group::class)->create()->id;
        },
    ];
});
