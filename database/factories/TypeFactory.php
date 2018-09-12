<?php

use App\Models\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {

    return [
        'name' => 'Type #' . $faker->unixTime(),
        'of'   => $faker->randomElement(['phone', 'email', 'fax'])
    ];

});

$factory->state(Type::class, 'phone', ['of' => 'phone']);
$factory->state(Type::class, 'email', ['of' => 'email']);
$factory->state(Type::class, 'fax', ['of' => 'fax']);
