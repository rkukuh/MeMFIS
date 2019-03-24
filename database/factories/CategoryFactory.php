<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'CAT-DUM-' . $number,
        'name' => 'Category Dummy #' . $number,
        'of'   => $faker->randomElement([
            'item',
            'taskcard-eo',
        ]),
    ];

});

/** STATES */

$factory->state(Category::class, 'item', ['of' => 'item']);
$factory->state(Category::class, 'taskcard-eo', ['of' => 'taskcard-eo']);
