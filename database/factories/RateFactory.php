<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rate;
use Faker\Generator as Faker;

$factory->define(Rate::class, function (Faker $faker) {
    return [
        'book_id' => $faker->numberBetween($min=1,$max=10),
        'user_id' => $faker->numberBetween($max=1,$max=10),
        'stars' => 0,
    ];
});
