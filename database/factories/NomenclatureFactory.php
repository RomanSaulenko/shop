<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Models\Nomenclature::class, function (Faker $faker) {
    return [
        'title' => $faker->email,
        'category_id' => factory(\App\Models\Category::class),
        'brand_id' => factory(\App\Models\Brand::class),
        'price_retail' => $faker->numberBetween(1, 1000),
        'price_procurement' => $faker->numberBetween(1000, 2000),
        'description' => $faker->text(50),
        'image' => '1.jpg'
    ];
});

