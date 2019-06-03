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
        $this->call(TypesOfDefectCardPauseReason::class);
        $this->call(TypesOfDocument::class);
        $this->call(TypesOfEligibility::class);
        $this->call(TypesOfEmail::class);
        $this->call(TypesOfFax::class);
        $this->call(TypesOfJobCardPauseReason::class);
        $this->call(TypesOfJournal::class);
        $this->call(TypesOfMaintenanceCycle::class);
        $this->call(TypesOfPhone::class);
        $this->call(TypesOfProject::class);
        $this->call(TypesOfProjectWorkPackageManhour::class);
        $this->call(TypesOfPurchaseRequest::class);
        $this->call(TypesOfRegulator::class);
        $this->call(TypesOfScheduledPayment::class);
        $this->call(TypesOfSchoolDegree::class);
        $this->call(TypesOfTaskCardEOManualAffected::class);
        $this->call(TypesOfTaskCardEORecurrence::class);
        $this->call(TypesOfTaskCardEOScheduledPriority::class);
        $this->call(TypesOfTaskCardSkill::class);
        $this->call(TypesOfTaskCardTask::class);
        $this->call(TypesOfTaskCardType::class);
        $this->call(TypesOfTermOfPayment::class);
        $this->call(TypesOfUnit::class);
        $this->call(TypesOfWebsite::class);
    }
}
