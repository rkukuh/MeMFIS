<?php

use App\Models\Unit;
use App\Models\Item;
use Spatie\Tags\Tag;
use App\Models\Price;
use App\Models\Journal;
use App\Models\Category;
use App\Models\Manufacturer;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {

    $number = $faker->unixTime();
    $is_ppn = $faker->boolean;

    return [
        'code' => 'MT-DUM-' . $number,
        'name' => 'Material Dummy #' . $number,
        'unit_id' => Unit::ofQuantity()->get()->random()->id,
        'unit_id' => function () {
            if (Unit::ofQuantity()->count()) {
                return Unit::ofQuantity()->get()->random()->id;
            }

            return factory(Unit::class)->create()->id;
        },
        'manufacturer_id' => function () use ($faker) {
            if (Manufacturer::count()) {
                return Manufacturer::get()->random()->id;
            }

            return $faker->randomElement([null, factory(Manufacturer::class)->create()->id]);
        },
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

/** CALLBACKS */

$factory->afterCreating(Item::class, function ($item, $faker) {

    // Category
    
    if ($faker->boolean) {
        // The business said that an item has only 0 or 1 category
        $item->categories()->attach(Category::ofItem()->get()->random());
    }

    // Interchange

    if ($faker->boolean) {
        for ($i = 1; $i <= rand(1, 5); $i++) {
            $item->interchanges()->save(Item::get()->random());
        }
    }

    // Journal

    if ($faker->boolean) {
        $item->journal()->associate(Journal::get()->random())->save();
    }

    // Price

    $item->prices()->saveMany(
        factory(Price::class, rand(3, 6))->make()
    );

    // Tags

    $tags = Tag::getWithType('item');

    for ($i = 1; $i <= rand(0, $tags->count()); $i++) {
        $item->tags()->attach($tags->find($i));
    }

});
