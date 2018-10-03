<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypesOfARC::class);
        $this->call(TypesOfCapability::class);
        $this->call(TypesOfEligibility::class);
        $this->call(TypesOfEmail::class);
        $this->call(TypesOfFax::class);
        $this->call(TypesOfJournal::class);
        $this->call(TypesOfPhone::class);
        $this->call(TypesOfRegulator::class);

        /** CUSTOMER'S COMPONENT REPAIR STATUS */

        Type::create([
            'name' => 'SERVICEABLE',
            'of'   => 'customer-component',
        ]);

        Type::create([
            'name' => 'UNSERVICEABLE',
            'of'   => 'customer-component',
        ]);

        // TODO: Make STATUS composite seeders for
        // - Customer's component repair status
        // - Marital status
        // - Employment status

    }
}
