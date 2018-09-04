<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(User::class, function (Faker $faker)
{
    $first_name = $faker->firstName;
    $last_name  = $faker->lastName;

    return [
        'name'            => $first_name . ' ' . $last_name,
        'email'           => strtolower($first_name . '.' . $last_name) . '@memfis.dev',
        'password'        => Hash::make('rahasia'),
        'remember_token'  => str_random(10),
    ];
});
