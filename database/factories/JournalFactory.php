<?php

use App\Models\Type;
use App\Models\Journal;
use Faker\Generator as Faker;

$factory->define(Journal::class, function (Faker $faker) {

    $sequence = $faker->unixTime();

    return [
        'code' => 'JR-DUM-' . $sequence,
        'name' => 'Journal Dummy #' . $sequence,
        'type_id' => Type::ofJournal()->get()->random()->id,
        'level' => 1,
    ];

});
