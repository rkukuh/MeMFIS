<?php

use App\Models\Type;
use App\Models\Threshold;
use Faker\Generator as Faker;

$factory->define(Threshold::class, function (Faker $faker) {

    return [
        'type_id' => function () {
            if (Type::ofMaintenanceCycle()->count()) {
                Type::ofMaintenanceCycle()->get()->random()->id;
            }

            return factory(Type::class)->states('maintenance-cycle')->create()->id;
        },
        'amount' => rand(2, 10) * 100,
    ];

});
