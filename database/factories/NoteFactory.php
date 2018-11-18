<?php

use App\Models\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {

    return [
        'body' => $faker->text,
    ];

});
