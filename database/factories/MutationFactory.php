<?php

use App\Models\Employee;
use App\Models\Storage;
use App\Models\Mutation;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Mutation::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'MUT-DUM-' . $number,
        'storage_out' => Storage::get()->random()->id,
        'storage_in' => Storage::get()->random()->id,
        'mutated_at' => Carbon::now(),
        'shipping_by' => Employee::get()->random()->id,
        'received_by' => Employee::get()->random()->id,
        'note' => $faker->randomElement([null, $faker->sentence]),
    ];

});
