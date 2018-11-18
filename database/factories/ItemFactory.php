<?php

use App\Models\Unit;
use App\Models\Item;
use Spatie\Tags\Tag;
use App\Models\Journal;
use App\Models\Category;
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

/** Callbacks */

$factory->afterCreating(Item::class, function ($item, $faker) {

    // The business said that an item has only 0 or 1 category
    $item->categories()->attach(Category::ofItem()->get()->random());

    $tags = Tag::getWithType('item');

    for ($i = 1; $i <= rand(0, $tags->count()); $i++) {
        $item->tags()->attach($tags->find($i));
    }

    if ($faker->boolean) {
        $item->journal()->associate(Journal::get()->random())->save();
    }

});
