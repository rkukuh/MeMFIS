<?php

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
        $this->call(TypesOfAddress::class);
        $this->call(TypesOfAPERI::class);
        $this->call(TypesOfARC::class);
        $this->call(TypesOfAviationDegree::class);
        $this->call(TypesOfCapability::class);
        $this->call(TypesOfDocument::class);
        $this->call(TypesOfEligibility::class);
        $this->call(TypesOfEmail::class);
        $this->call(TypesOfFax::class);
        $this->call(TypesOfJournal::class);
        $this->call(TypesOfMaintenanceCycle::class);
        $this->call(TypesOfPhone::class);
        $this->call(TypesOfRegulator::class);
        $this->call(TypesOfSchoolDegree::class);
        $this->call(TypesOfTaskCardTask::class);
        $this->call(TypesOfTaskCardType::class);
        $this->call(TypesOfUnit::class);
        $this->call(TypesOfWebsite::class);
    }
}
