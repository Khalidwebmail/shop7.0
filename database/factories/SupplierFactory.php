<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->freeEmail,
        'phone' => $faker->numerify("017########"),
        'address' => $faker->address,
        'shop_name' => $faker->company
    ];
});
