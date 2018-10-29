<?php

use App\Models\Unit;
use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {

    $sequence = $faker->unixTime();
    $is_ppn = $faker->boolean;

    return [
        'code' => 'IT-EX-' . $sequence,
        'name' => 'Item Example #' . $sequence,
        'unit_id' => Unit::get()->random()->id,
        'unit_quantity' => 1,
        'is_ppn' => $is_ppn,
        'ppn_amount' => function() use ($is_ppn) {
            if ($is_ppn) {
                return 10;
            }
        },
        'is_stock' => $faker->boolean,
    ];

});
