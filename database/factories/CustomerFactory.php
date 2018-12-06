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

    $name = 'Customer Dummy #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
        'name' => $name,
        'payment_term' => $faker->randomElement([
            null,
            Type::ofPaymentTerm()->get()->random()->id
        ]),
        'banned_at' => $faker->randomElement([
            null,
            Carbon::now()
        ]),
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
