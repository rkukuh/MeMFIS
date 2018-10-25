<?php

use App\Models\Type;
use App\Models\Journal;
use Faker\Generator as Faker;

$factory->define(Journal::class, function (Faker $faker) {

    $sequence = $faker->unixTime();

    return [
        'code' => 'JR-EX-' . $sequence,
        'name' => 'Journal Example #' . $sequence,
        'type_id' => Type::ofJournal()->get()->random()->id,
        'level' => 1,
    ];

});
