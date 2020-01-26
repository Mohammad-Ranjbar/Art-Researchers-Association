<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ListBook;
use Faker\Generator as Faker;

$factory->define(ListBook::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->text,
    ];
});
