<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\RequestNewbook;
use Faker\Generator as Faker;

$factory->define(RequestNewbook::class, function (Faker $faker) {
    return [
        'book_name' => $faker->name,
        'author' => $faker->name,
        'request_content' => $faker->text,
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'status' => rand(0, 1),
    ];
});
