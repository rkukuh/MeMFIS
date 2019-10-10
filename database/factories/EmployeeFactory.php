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
use App\Models\BankAccount;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {

    $firstNameMale = $faker->firstNameMale();
    $firstNameFemale = $faker->firstNameFemale();
    
    return [
        'code' => 'EMP-DUM-' . $faker->unixTime(),
        'user_id' => null,
        'first_name' => $faker->randomElement([$firstNameMale, $firstNameFemale]),
        'last_name' => $faker->lastName(),
        'dob' => Carbon::now()->subYear(rand(20, 50)),
        'dob_place' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
        'gender' => $faker->randomElement(['m', 'f']),
        'religion' => $faker->randomElement(['islam','khonghucu','budha','kristen','hindu']),
        'marital_status' => $faker->randomElement(['s','m']),
        'nationality' => $faker->randomElement(['Indonesia','Japan','Zimbabwe','South Africa']),
        'country' => 'Indonesia',
        'city' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
        'joined_date' => Carbon::now()->toDateString(),
        'updated_at' => null
    ];

});

/** CALLBACKS */

$factory->afterCreating(Employee::class, function ($employee, $faker) {

    // Address

    if ($faker->boolean) {
        $employee->addresses()->saveMany(factory(Address::class, rand(2, 4))->make());
    }

    // Bank Account
    
    if ($faker->boolean) {
        $employee->bank_accounts()->saveMany(factory(BankAccount::class, rand(1, 3))->make());
    }

    // Document

    if ($faker->boolean) {
        $employee->documents()->saveMany(factory(Document::class, rand(1, 3))->make());
    }

    // Email

    if ($faker->boolean) {
        $employee->emails()->saveMany(factory(Email::class, rand(1, 2))->make());
    }

    // Fax

    if ($faker->boolean) {
        $employee->faxes()->saveMany(factory(Fax::class, rand(1, 2))->make());
    }

    // Phone

    if ($faker->boolean) {
        $employee->phones()->saveMany(factory(Phone::class, rand(1, 2))->make());
    }

    // Website

    if ($faker->boolean) {
        $employee->websites()->saveMany(factory(Website::class, rand(2, 4))->make());
    }

    // Language 

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
});
