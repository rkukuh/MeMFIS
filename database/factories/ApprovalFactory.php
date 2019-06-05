<?php

use App\Models\Approval;
use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Approval::class, function (Faker $faker) {

    return [
        'approved_by' => Employee::get()->random()->id
    ];

});
