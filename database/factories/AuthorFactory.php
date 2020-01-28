<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use App\Book;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'image'     => '/1.jpg',
        'book_id'   =>factory(Book::class),
        'biography' => $faker->paragraph,
        'birthday'  => $faker->dateTime,
        'death'     => $faker->dateTime,
    ];
});
