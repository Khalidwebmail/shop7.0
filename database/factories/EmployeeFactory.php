<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->freeEmail,
        'phone' => $faker->numerify("017########"),
        'address' => $faker->address,
        'salary' => rand(10000, 20000),
        'nid' => $faker->numerify("#############"),
        'joining_date' => Carbon::now()
    ];
});
