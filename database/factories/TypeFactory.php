<?php

use App\Models\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {

    $name = 'Type #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
        'name' => $name,
        'of'   => $faker->randomElement([
            'arc',
            'fax',
            'phone',
            'email',
            'journal',
            'regulator',
            'capability',
            'eligibility',
        ]),
        'description',
    ];

});

$factory->state(Type::class, 'arc', ['of' => 'arc']);
$factory->state(Type::class, 'fax', ['of' => 'fax']);
$factory->state(Type::class, 'phone', ['of' => 'phone']);
$factory->state(Type::class, 'email', ['of' => 'email']);
$factory->state(Type::class, 'journal', ['of' => 'journal']);
$factory->state(Type::class, 'regulator', ['of' => 'regulator']);
$factory->state(Type::class, 'capability', ['of' => 'capability']);
$factory->state(Type::class, 'eligibility', ['of' => 'eligibility']);
