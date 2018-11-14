<?php

use App\Models\Type;
use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {

    $latitude = $longitude = null;

    if ($faker->boolean) {
        $latitude = $faker->latitude;
        $longitude = $faker->longitude;
    }

    return [
        'type_id' => Type::ofAddress()->get()->random()->id,
        'address' => $faker->address,
        'latitude' => $latitude,
        'longitude' => $longitude,
    ];

});
