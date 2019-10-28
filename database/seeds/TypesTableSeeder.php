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
        $this->call(TypesOfBenefitBaseCalculation::class);
        $this->call(TypesOfBenefitProrateCalculation::class);
        $this->call(TypesOfCapability::class);
        $this->call(TypesOfCompany::class);
        $this->call(TypesOfDefectCardCloseReason::class);
        $this->call(TypesOfDefectCardPauseReason::class);
        $this->call(TypesOfDefectCardProposeCorrection::class);
        $this->call(TypesOfDepartment::class);
        $this->call(TypesOfDocument::class);
        $this->call(TypesOfEligibility::class);
        $this->call(TypesOfEmail::class);
        $this->call(TypesOfFax::class);
        $this->call(TypesOfHtCrrCloseReason::class);
        $this->call(TypesOfHtCrrPauseReason::class);
        $this->call(TypesOfHtCrrType::class);
        $this->call(TypesOfItemRequest::class);
        $this->call(TypesOfJobCardCloseReason::class);
        $this->call(TypesOfJobCardLogBook::class);
        $this->call(TypesOfJobCardPauseReason::class);
        $this->call(TypesOfMaintenanceCycle::class);
        $this->call(TypesOfPhone::class);
        $this->call(TypesOfProject::class);
        $this->call(TypesOfProjectWorkPackageManhour::class);
        $this->call(TypesOfPurchaseRequest::class);
        $this->call(TypesOfRegulator::class);
        $this->call(TypesOfRIRPackingAndHandlingCheckCondition::class);
        $this->call(TypesOfRIRPackingAndHandlingCheckType::class);
        $this->call(TypesOfRIRPreservationCheck::class);
        $this->call(TypesOfScheduledPayment::class);
        $this->call(TypesOfSchoolDegree::class);
        $this->call(TypesOfTaskCardEOManualAffected::class);
        $this->call(TypesOfTaskCardEORecurrence::class);
        $this->call(TypesOfTaskCardEOScheduledPriority::class);
        $this->call(TypesOfTaskCardSkill::class);
        $this->call(TypesOfTaskCardTask::class);
        $this->call(TypesOfTaskCardType::class);
        $this->call(TypesOfTax::class);
        $this->call(TypesOfTermOfPayment::class);
        $this->call(TypesOfUnit::class);
        $this->call(TypesOfWebsite::class);
    }
}
