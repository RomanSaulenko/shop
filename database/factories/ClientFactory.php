<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->email
    ];
});

