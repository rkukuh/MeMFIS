<?php

use App\Models\Category;
use App\Models\Description;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $name = 'Category Dummy #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
        'name' => $name,
        'of'   => $faker->randomElement([
            'item',
            'taskcard-eo',
        ]),
    ];

});

/** STATES */

$factory->state(Category::class, 'item', ['of' => 'item']);
$factory->state(Category::class, 'taskcard-eo', ['of' => 'taskcard-eo']);
