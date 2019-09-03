<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author_book;
use Faker\Generator as Faker;

$factory->define(Author_book::class, function (Faker $faker) {
    return [
        'author_id' => $faker->numberBetween($min = 1, $max = 10),
        'book_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
