<?php

use App\User;
use App\Models\Type;
use App\Models\Status;
use App\Models\Country;
use App\Models\Religion;
use App\Models\Employee;
use App\Models\Workshift;
use App\Models\Department;
use App\Models\Nationality;
use Carbon\Carbon;
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
        'is_active' => $faker->boolean,
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
        'gender_id' => Type::ofGender()->where('code', $faker->randomElement(['male','female']))->first()->id,
        'religion_id' => Religion::where('code', $faker->randomElement(['christian-protestant','islam','kong-hu-cu','buddha','catholic','hindu']))->first()->id,
        'marital_id' => Status::ofMarital()->where('code', $faker->randomElement(['married','single','cerai-hidup','cerai-mati']))->first()->id,
        'country_id' => Country::first()->id,
        'city' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
        'joined_date' => Carbon::now()->toDateString()
    ]));

   
});
