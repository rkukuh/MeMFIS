<?php

use App\Models\Unit;
use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {

    $sequence = $faker->unixTime();

    return [
        'code' => 'IT-EX-' . $sequence,
        'name' => 'Item Example #' . $sequence,
        'unit_id' => Unit::get()->random()->id,
        'unit_quantity' => 1,
        'is_ppn' => 0,
        'is_stock' => 1,
    ];

});
