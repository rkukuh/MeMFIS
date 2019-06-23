<?php

use App\Models\Facility;
use Faker\Generator as Faker;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageFacility;

$factory->define(ProjectWorkPackageFacility::class, function (Faker $faker) {

    return [
        'project_workpackage_id' => function () {
            return ProjectWorkPackage::get()->random()->id;
        },
        'facility_id' => function () {
            return Facility::get()->random()->id;
        },
        'note' => $faker->randomElement([null, $faker->text]),
    ];

});
