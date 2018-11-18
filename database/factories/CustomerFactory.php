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

$factory->afterCreating(Customer::class, function ($employee, $faker) {
    if ($faker->boolean) {
        $employee->addresses()->saveMany(factory(Address::class, rand(2, 4))->make());
    }

    if ($faker->boolean) {
        $employee->documents()->saveMany(factory(Document::class, rand(1, 3))->make());
    }

    if ($faker->boolean) {
        $employee->emails()->saveMany(factory(Email::class, rand(1, 2))->make());
    }

    if ($faker->boolean) {
        $employee->faxes()->saveMany(factory(Fax::class, rand(1, 2))->make());
    }

    if ($faker->boolean) {
        $employee->journal()->associate(Journal::get()->random())->save();
    }

    if ($faker->boolean) {
        $employee->phones()->saveMany(factory(Phone::class, rand(1, 2))->make());
    }

    if ($faker->boolean) {
        $employee->websites()->saveMany(factory(Website::class, rand(2, 4))->make());
    }
});
