<?php

use App\Models\Admins;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Admins::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'status' => 1
    ];
});
