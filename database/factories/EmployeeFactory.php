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
use App\Models\Type;
use App\Models\Status;
use App\Models\Department;
use App\Models\Country;
use App\Models\Religion;
use App\Models\Workshift;
use App\Models\Nationality;
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
        'gender_id' => Type::ofGender()->where('code', $faker->randomElement(['male','female']))->first()->id,            
        'religion_id' => Religion::where('code', $faker->randomElement(['christian-protestant','islam','kong-hu-cu','buddha','catholic','hindu']))->first()->id,
        'marital_id' => Status::ofMarital()->where('code', $faker->randomElement(['married','single','cerai-hidup','cerai-mati']))->first()->id,
        'country_id' => Country::first()->id,
        'city' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
        'joined_date' => Carbon::now()->toDateString(),
    ];

});

/** CALLBACKS */

$factory->afterCreating(Employee::class, function ($employee, $faker) {
    $now = Carbon::now();

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

    // Department
    $departmentSize = Department::count('id');
    $department = Department::where('id', rand(1, $departmentSize) )->first();

    $employee->department()->attach($department->id, [
        'joined_at' => $now,
        'left_at' => null,
        'maximum_overtime_period' => $department->maximum_period,
        'overtime_threshold' => Carbon::createMidnightDate($now->year, $now->month, $now->day)->addHours(6),
        'overtime_allowance' => $department->maximum_holiday
    ]);
    
    // Workshift
    $workshift = Workshift::find($faker->randomElement([1,2])); 
    $employee->workshifts()->attach($workshift->id, [
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ]);

    // Nationality
    $employee->nationalities()->attach(Nationality::first()->id, [
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ]);
});
