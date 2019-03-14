<?php

use App\Models\Type;
use App\Models\School;
use Faker\Generator as Faker;

$factory->define(School::class, function (Faker $faker) {

    $name = null;
    $degree = Type::ofSchoolDegree()->get()->random();

    switch($degree->code) {
        case 'elementary':
            $name = 'SD';
            break;
        case 'junior-high-school':
            $name = 'SMP';
            break;
        case 'senior-high-school':
            $name = 'SMA';
            break;
        case 'vocational':
            $name = 'SMK';
            break;
        case 'diploma':
        case 'bachelor':
        case 'master':
        case 'doctor':
            $name = 'University';
            break;
        default:
            $name = 'School';
            break;
    }

    $number = $faker->unixTime();

    return [
        'code' => 'SCH-DUM-' . $number,
        'name' => 'School Dummy #' . $number,
        'degree' => $degree->id,
    ];

});
