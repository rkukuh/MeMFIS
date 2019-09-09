<?php

use App\User;
use App\Models\Employee;
use Faker\Generator as Faker;
use Carbon\Carbon;
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
        'is_active' => $faker->boolean(),
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
        'last_name' => $user->name,
        'dob' => Carbon::now()->subYear(rand(20, 50)),
        'dob_place' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
        'gender' => $faker->randomElement(['m', 'f']),
        'religion' => $faker->randomElement(['islam','khonghucu','budha','kristen','hindu']),
        'marital_status' => $faker->randomElement(['s','m']),
        'nationality' => $faker->randomElement(['Indonesia','Japan','Zimbabwe','South Africa']),
        'country' => 'indonesia',
        'city' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
        'joined_date' => Carbon::now()->toDateString(),
        'updated_at' => null,
    ]));

});
