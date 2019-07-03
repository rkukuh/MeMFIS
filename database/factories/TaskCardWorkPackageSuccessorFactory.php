<?php

use App\Models\TaskCard;
use Faker\Generator as Faker;
use App\Models\Pivots\TaskCardWorkPackage;
use App\Models\TaskCardWorkPackageSuccessor;

$factory->define(TaskCardWorkPackageSuccessor::class, function (Faker $faker) {

    return [
        'taskcard_workpackage_id' => function () {
            return TaskCardWorkPackage::get()->random()->id;
        },
        'next' => function () {
            return TaskCard::get()->random()->id;
        },
    ];

});
