<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use App\Models\Category;
use App\Models\Nomenclature;
use Faker\Generator as Faker;

$factory->define(Nomenclature::class, function (Faker $faker) {
    return [
        'title' => $faker->email,
        'category_id' => factory(Category::class),
        'brand_id' => factory(Brand::class),
        'price_retail' => $faker->numberBetween(1, 1000),
        'price_procurement' => $faker->numberBetween(1000, 2000),
        'description' => $faker->text(50),
        'image' => '1.jpg'
    ];
});

