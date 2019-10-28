<?php

use Carbon\Carbon;
use App\Models\Storage;
use App\Models\Employee;
use App\Models\ItemRequest;
use App\Models\Type;
use Faker\Generator as Faker;

$factory->define(ItemRequest::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'REQ-DUM-' . $number,
        'type_id' => Type::ofItemRequest()->get()->random()->id,
        'requestable_type' => null,
        'requestable_id' => null,
        'requested_at' => Carbon::now(),
        'storage_id' => Storage::get()->random()->id,
        'received_by' => Employee::get()->random()->id,
        'section' => null,
        'note' => $faker->randomElement([null, $faker->sentence]),
    ];

});
