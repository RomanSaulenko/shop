<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order\Client;
use App\Models\Order\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'client_id' => factory(Client::class),
        'delivery_id' => $faker->unique()->numberBetween(0, 1000000),
    ];
});
