<?php

use App\Models\Unit;
use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {

    $sequence = $faker->unixTime();
    $is_ppn = $faker->boolean;

    return [
        'code' => 'MT-DUM-' . $sequence,
        'name' => 'Material Dummy #' . $sequence,
        'unit_id' => Unit::ofQuantity()->get()->random()->id,
        'is_ppn' => $is_ppn,
        'ppn_amount' => function() use ($is_ppn) {
            if ($is_ppn) {
                return 10;
            }
        },
        'is_stock' => $faker->boolean,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
