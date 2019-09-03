<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 100 , $indexSize = 1),
        'description' => $faker->text,
        'book_content' => $faker->paragraph($nbSentences = 5 , $variableNbSentences = true),
        'image' => $faker->image,
        'price' => 0,
        'number_page' => $faker->numberBetween($min = 500, $max = 1000),
        'view' => 0,
        'publisher_id' => $faker->numberBetween($min = 1, $max = 10),
        'category_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
