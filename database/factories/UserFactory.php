<?php

use App\User;
use App\Models\Employee;
use Faker\Generator as Faker;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

$factory->define(User::class, function (Faker $faker)
{
    $first_name = $faker->firstName;
    $last_name  = $faker->lastName;

    return [
        'name' => $first_name . ' ' . $last_name,
        'email' => strtolower($first_name . '.' . $last_name) . '@memfis.dev',
        'password' => Hash::make('rahasia'),
        'remember_token' => str_random(10),
    ];

});

/** CALLBACKS */

$factory->afterCreating(User::class, function ($user, $faker) {

    $user->assignRole(
        Role::where('name', 'dummy')->first()
    );

    $user->employee()->save(factory(Employee::class)->make([
        'first_name' => $user->name,
        'middle_name' => null,
        'last_name' => null,
    ]));

});
