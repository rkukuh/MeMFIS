<?php

use Carbon\Carbon;
use App\Models\Fax;
use App\Models\Phone;
use App\Models\Email;
use App\Models\Level;
use App\Models\School;
use App\Models\Address;
use App\Models\Website;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Language;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {

    $firstNameMale = $faker->firstNameMale();
    $firstNameFemale = $faker->firstNameFemale();
    $lastname = $faker->lastName();

    return [
        'code' => 'EMP-DUM-' . $faker->unixTime(),
        'first_name' => $faker->randomElement([$firstNameMale, $firstNameFemale]),
        'middle_name' => $faker->randomElement([null, $faker->lastName()]),
        'last_name' => $lastname,
        'dob' => Carbon::now()->subYear(rand(20, 50)),
        'gender' => $faker->randomElement(['m', 'f']),
        'hired_at' => Carbon::now()->subYear(rand(1, 10))
    ];

});

/** Callbacks */

$factory->afterCreating(Employee::class, function ($employee, $faker) {
    if ($faker->boolean) {
        $employee->addresses()->saveMany(factory(Address::class, rand(2, 4))->make());
    }

    if ($faker->boolean) {
        $employee->documents()->saveMany(factory(Document::class, rand(1, 3))->make());
    }

    if ($faker->boolean) {
        $employee->emails()->saveMany(factory(Email::class, rand(1, 2))->make());
    }

    if ($faker->boolean) {
        $employee->faxes()->saveMany(factory(Fax::class, rand(1, 2))->make());
    }

    if ($faker->boolean) {
        $employee->phones()->saveMany(factory(Phone::class, rand(1, 2))->make());
    }

    if ($faker->boolean) {
        $employee->websites()->saveMany(factory(Website::class, rand(2, 4))->make());
    }

    if ($faker->boolean) {
        for ($i = 1; $i <= rand(2, 4); $i++) {
            $employee->languages()->attach(
                Language::get()->random(),
                [
                    'reading_level' => Level::ofLanguage()->get()->random()->score,
                    'speaking_level' => Level::ofLanguage()->get()->random()->score,
                    'writing_level' => Level::ofLanguage()->get()->random()->score,
                    'understanding_level' => Level::ofLanguage()->get()->random()->score,
                ]
            );
        }
    }

    if ($faker->boolean) {
        for ($i = 1; $i <= rand(3, 4); $i++) {
            $employee->schools()->attach(
                School::get()->random(),
                [
                    'start_at' => Carbon::now()->subYear(rand(3, 5)),
                    'graduated_at' => $faker->randomElement([null, Carbon::now()->subYear(1, 2)]),
                ]
            );
        }
    }
});
