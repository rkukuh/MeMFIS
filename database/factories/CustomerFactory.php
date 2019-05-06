<?php

use Carbon\Carbon;
use App\Models\Fax;
use App\Models\Type;
use App\Models\Phone;
use App\Models\Email;
use App\Models\Address;
use App\Models\Website;
use App\Models\Journal;
use App\Models\Document;
use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'CUS-DUM-' . $number,
        'name' => 'Customer Dummy #' . $number,
        'attention' => function () use ($faker) {
            $attentions = [];

            for ($i = 1; $i <= rand(2, 4); $i++) {
                $attentions[]['name'] = $faker->name;
            }

            return $faker->randomElement([null, json_encode($attentions)]);
        },
        'payment_term' => rand(1, 10) * 10,
        'banned_at' => $faker->randomElement([null, Carbon::now()]),
    ];

});

/** Callbacks */

$factory->afterCreating(Customer::class, function ($customer, $faker) {
    if ($faker->boolean) {
        $customer->addresses()->saveMany(factory(Address::class, rand(2, 4))->make());
    }

    if ($faker->boolean) {
        $customer->documents()->saveMany(factory(Document::class, rand(1, 3))->make());
    }

    if ($faker->boolean) {
        $customer->emails()->saveMany(factory(Email::class, rand(1, 2))->make());
    }

    if ($faker->boolean) {
        $customer->faxes()->saveMany(factory(Fax::class, rand(1, 2))->make());
    }

    if ($faker->boolean) {
        $customer->journal()->associate(Journal::get()->random())->save();
    }

    if ($faker->boolean) {
        $customer->phones()->saveMany(factory(Phone::class, rand(1, 2))->make());
    }

    if ($faker->boolean) {
        $customer->websites()->saveMany(factory(Website::class, rand(2, 4))->make());
    }
});
