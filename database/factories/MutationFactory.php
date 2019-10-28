<?php

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
        'note' => $faker->randomElement([null, $faker->sentence]),
    ];

});
