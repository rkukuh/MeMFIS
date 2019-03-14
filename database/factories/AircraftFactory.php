<?php

use App\Models\Aircraft;
use App\Models\Manufacturer;
use Faker\Generator as Faker;

$factory->define(Aircraft::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'AC-DUM-' . $number,
        'name' => 'Aircraft Dummy #' . $number,
        'manufacturer_id' => function () {
            if (Manufacturer::count()) {
                return Manufacturer::get()->random()->id;
            }

            return factory(Manufacturer::class)->create()->id;
        },
    ];

});
