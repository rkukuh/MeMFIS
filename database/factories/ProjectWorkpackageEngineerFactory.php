<?php

use App\Models\Type;
use App\Models\Employee;
use Faker\Generator as Faker;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageEngineer;

$factory->define(ProjectWorkPackageEngineer::class, function (Faker $faker) {

    return [
        'project_workpackage_id' => function () {
            return ProjectWorkPackage::get()->random()->id;
        },
        'skill_id' => function () {
            return Type::ofTaskCardSkill()->get()->random()->id;
        },
        'engineer_id' => function () {
            return Employee::get()->random()->id;
        },
        'tat' => $faker->randomDigitNotNull,
    ];

});
