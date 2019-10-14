<?php

use App\Models\Type;
use App\Models\Company;
use App\Models\Storage;
use App\Models\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'DEPT-DUM-' . $number]),
        'company_id' => function () {
            if (Company::count()) {
                return Company::get()->random()->id;
            }

            return factory(Company::class)->create()->id;
        },
        'parent_id' => null,
        'type_id' => $faker->randomElement([null, Type::ofDepartment()->get()->random()->id]),
        'name' => 'Dept. ' . $faker->word,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});

/** Callbacks */

$factory->afterCreating(Department::class, function ($department, $faker) {

    // Storage
    
    if ($faker->boolean) {
        $department->storages()->save(Storage::get()->random());
    }

});
