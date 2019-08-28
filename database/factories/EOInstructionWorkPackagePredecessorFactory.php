<?php

use App\Models\EOInstruction;
use Faker\Generator as Faker;
use App\Models\EOInstructionWorkPackage;

$factory->define(EOInstructionWorkPackagePredecessor::class, function (Faker $faker) {

    return [
        'eo_instruction_workpackage_id' => function () {
            return EOInstructionWorkPackage::get()->random()->id;
        },
        'previous' => function () {
            return EOInstruction::get()->random()->id;
        },
    ];

});
