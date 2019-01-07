<?php

use App\Models\Aircraft;
use App\Models\Manufacturer;
use Faker\Generator as Faker;

$factory->define(Aircraft::class, function (Faker $faker) {

    $name = 'Aircraft Dummy #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
        'name' => $name,
        'manufacturer_id' => function () {
            if (Manufacturer::count()) {
                return Manufacturer::get()->random()->id;
            }

            return factory(Manufacturer::class)->create()->id;
        },
    ];

});
