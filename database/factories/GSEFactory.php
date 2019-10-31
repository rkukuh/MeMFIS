<?php

use Carbon\Carbon;
use App\Models\GSE;
use App\Models\Storage;
use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(GSE::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'GSE-DUM-' . $number,
        'gseable_type' => null,
        'gseable_id' => null,
        'storage_id' => Storage::get()->random()->id,
        'returned_at' => Carbon::now(),
        'returned_by' => Employee::get()->random()->id,
        'section' => null,
        'note' => $faker->randomElement([null, $faker->sentence]),
    ];

});
