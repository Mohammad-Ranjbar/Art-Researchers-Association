<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\ListBook;
use App\User;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'publisher'   => $faker->company,
        'description' => $faker->text,
        'image'       => '/1.jpg',
        'list_id'     => factory(ListBook::class),
        'user_id'     => factory(User::class),
        'author_id'   => factory(\App\Author::class),
    ];
});
