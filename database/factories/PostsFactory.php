<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$userID = 0;

$factory->define(App\Posts::class, function (Faker $faker) {
    return [
        'userID' => function () {
            global $userID;
            $userID = factory(App\User::class)->create()->id;
            return $userID;
        },
        'firstName' => function () {
            global $userID;
            $user = App\User::where('id', $userID)->value('name');
            return $user;
        },
        'groupID' => function () {
            return factory(App\Group::class)->create()->id;
        },
        'eventID' => function () {
            return factory(App\Event::class)->create()->id;
        },
    ];
});
