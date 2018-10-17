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
        $this->call(TypesOfAviationDegree::class);
        $this->call(TypesOfCapability::class);
        $this->call(TypesOfEligibility::class);
        $this->call(TypesOfEmail::class);
        $this->call(TypesOfFax::class);
        $this->call(TypesOfFormalSchoolDegree::class);
        $this->call(TypesOfJournal::class);
        $this->call(TypesOfPhone::class);
        $this->call(TypesOfRegulator::class);
        $this->call(TypesOfUnit::class);
    }
}
