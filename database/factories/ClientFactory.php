<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order\Client;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)
    ];
});

