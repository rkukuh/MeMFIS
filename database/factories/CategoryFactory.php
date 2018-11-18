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
        ]),
    ];

});

/** Callbacks */

$factory->afterCreating(Category::class, function ($category, $faker) {
    $faker->randomElement([
        null,
        $category->descriptions()->save(factory(Description::class)->make()),
    ]);
});

/** States */

$factory->state(Category::class, 'item', ['of' => 'item']);
