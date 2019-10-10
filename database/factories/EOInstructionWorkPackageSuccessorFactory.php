<?php

use App\Models\EOInstruction;
use Faker\Generator as Faker;
use App\Models\EOInstructionWorkPackage;

$factory->define(EOInstructionWorkPackageSuccessor::class, function (Faker $faker) {

    return [
        'eo_instruction_workpackage_id' => function () {
            return EOInstructionWorkPackage::get()->random()->id;
        },
        'next' => function () {
            return EOInstruction::get()->random()->id;
        },
    ];

});
