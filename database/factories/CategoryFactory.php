<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'parent_id' => 0,
        'title' => $faker->unique()->safeEmail,
        'image' => $faker->text,
    ];
});
