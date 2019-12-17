<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sensor;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Sensor::class, function (Faker $faker) {
    return [
        'alias' => $faker->name,
        'type' => $faker->fileExtension,
        'data' => $faker->state,
        'gps' => $faker->latitude.", ".$faker->longitude
    ];
});
