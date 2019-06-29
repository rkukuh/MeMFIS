<?php

use App\Models\TaskCard;
use Faker\Generator as Faker;
use App\Models\Pivots\TaskCardWorkPackage;
use App\Models\TaskCardWorkPackagePredecessor;

$factory->define(TaskCardWorkPackagePredecessor::class, function (Faker $faker) {

    return [
        'taskcard_workpackage_id' => function () {
            return TaskCardWorkPackage::get()->random()->id;
        },
        'previous' => function () {
            return TaskCard::get()->random()->id;
        },
    ];

});
