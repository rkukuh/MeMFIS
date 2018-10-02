<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfEligibility extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'DHC-6',
            'of'   => 'eligibility',
        ]);
    }
}
