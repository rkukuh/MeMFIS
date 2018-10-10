<?php

use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {

    $sequence = $faker->unixTime();

    return [
        'code' => 'IT-EX-' . $sequence,
        'name' => 'Item Example #' . $sequence,
    ];

});
