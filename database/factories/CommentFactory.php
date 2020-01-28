<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use App\Book;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body'    => $faker->paragraph,
        'user_id' => factory(User::class),
        'book_id' => factory(Book::class),
    ];
});
