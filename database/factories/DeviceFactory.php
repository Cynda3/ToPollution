<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Device;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Device::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'user_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});
