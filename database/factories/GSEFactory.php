<?php

use Carbon\Carbon;
use App\Models\GSE;
use App\Models\Storage;
use App\Models\Employee;
use App\Models\ItemRequest;
use Faker\Generator as Faker;

$factory->define(GSE::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'GSE-DUM-' . $number,
        'request_id' => function () {
            if (ItemRequest::count()) {
                return ItemRequest::get()->random()->id;
            }
            return factory(ItemRequest::class)->create()->id;
        },
        'storage_id' => Storage::get()->random()->id,
        'returned_at' => Carbon::now(),
        'returned_by' => Employee::get()->random()->id,
        'section' => null,
        'note' => $faker->randomElement([null, $faker->sentence]),
    ];

});
