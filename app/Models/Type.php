<?php

namespace App\Models;

use App\MemfisModel;
use Illuminate\Database\Eloquent\Builder;

class Type extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
        'description',
    ];

    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include type of Address.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAddress(Builder $query)
    {
        return $query->where('of', 'address');
    }

    /**
     * Scope a query to only include type of AP/ERI.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAPERI(Builder $query)
    {
        return $query->where('of', 'aperi');
    }

    /**
     * Scope a query to only include type of ARC.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfARC(Builder $query)
    {
        return $query->where('of', 'arc');
    }

    /**
     * Scope a query to only include type of Address.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAttendanceCorrection(Builder $query)
    {
        return $query->where('of', 'attendance-correction');
    }

    /**
     * Scope a query to only include type of Aviation School Degree.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAviationDegree(Builder $query)
    {
        return $query->where('of', 'aviation-degree');
    }

    /**
     * Scope a query to only include type of Benefit: Base Calculation.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfBenefitBaseCalculation(Builder $query)
    {
        return $query->where('of', 'benefit-base-calculation');
    }

    /**
     * Scope a query to only include type of Benefit: Prorate Calculation.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfBenefitProrateCalculation(Builder $query)
    {
        return $query->where('of', 'benefit-prorate-calculation');
    }

    /**
     * Scope a query to only include type of Capability.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCapability(Builder $query)
    {
        return $query->where('of', 'capability');
    }

    /**
     * Scope a query to only include type of Coa.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCoa(Builder $query)
    {
        return $query->where('of', 'coa');
    }

    /**
     * Scope a query to only include type of Coa.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCoaTransaction(Builder $query)
    {
        return $query->where('of', 'coa-transaction');
    }

    /**
     * Scope a query to only include type of Company.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCompany(Builder $query)
    {
        return $query->where('of', 'company');
    }

    /**
     * Scope a query to only include type of DefectCard close reason.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDefectCardCloseReason(Builder $query)
    {
        return $query->where('of', 'defectcard-close-reason');
    }

    /**
     * Scope a query to only include type of DefectCard pause reason.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDefectCardPauseReason(Builder $query)
    {
        return $query->where('of', 'defectcard-pause-reason');
    }

    /**
     * Scope a query to only include type of DefectCard propose correction.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDefectCardProposeCorrection(Builder $query)
    {
        return $query->where('of', 'defectcard-propose-correction');
    }

    /**
     * Scope a query to only include type of Department.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDepartment(Builder $query)
    {
        return $query->where('of', 'department');
    }

    /**
     * Scope a query to only include type of Document.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDocument(Builder $query)
    {
        return $query->where('of', 'document');
    }

    /**
     * Scope a query to only include type of Eligibility.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEligibility(Builder $query)
    {
        return $query->where('of', 'eligibility');
    }

    /**
     * Scope a query to only include type of Email.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEmail(Builder $query)
    {
        return $query->where('of', 'email');
    }

    /**
     * Scope a query to only include type of Fax.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfFax(Builder $query)
    {
        return $query->where('of', 'fax');
    }

    /**
     * Scope a query to only include type of HTCRR.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfHtCrrType(Builder $query)
    {
        return $query->where('of', 'htcrr-type');
    }

    /**
     * Scope a query to only include type of HTCRR's close reason.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfHtCrrCloseReason(Builder $query)
    {
        return $query->where('of', 'htcrr-close-reason');
    }

    /**
     * Scope a query to only include type of HTCRR's pause reason.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfHtCrrPauseReason(Builder $query)
    {
        return $query->where('of', 'htcrr-pause-reason');
    }

    /**
     * Scope a query to only include type of HTCRR's skill.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfHtCrrSkill(Builder $query)
    {
        return $query->where('of', 'taskcard-skill');
    }

    /**
     * Scope a query to only include type of ItemRequest.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfItemRequest(Builder $query)
    {
        return $query->where('of', 'item-request');
    }

    /**
     * Scope a query to only include type of JobCard close reason.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfJobCardCloseReason(Builder $query)
    {
        return $query->where('of', 'jobcard-close-reason');
    }

    /**
     * Scope a query to only include type of JobCard logbook.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfJobCardLogBook(Builder $query)
    {
        return $query->where('of', 'jobcard-logbook');
    }

    /**
     * Scope a query to only include type of JobCard pause reason.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfJobCardPauseReason(Builder $query)
    {
        return $query->where('of', 'jobcard-pause-reason');
    }

    /**
     * Scope a query to only include type of leave type based on.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfLeaveType(Builder $query)
    {
        return $query->where('of', 'leave-type');
    }

    /**
     * Scope a query to only include type of Aircraft Maintenance Cycle.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfMaintenanceCycle(Builder $query)
    {
        return $query->where('of', 'maintenance-cycle');
    }

    /**
     * Scope a query to only include type of Aircraft Maintenance Cycle.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfNationality(Builder $query)
    {
        return $query->where('of', 'nationality');
    }

    /**
     * Scope a query to only include type of Phone.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPhone(Builder $query)
    {
        return $query->where('of', 'phone');
    }

    /**
     * Scope a query to only include type of Project.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfProject(Builder $query)
    {
        return $query->where('of', 'project');
    }

    /**
     * Scope a query to only include type of Project WorkPackage Manhour proportion.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfProjectWorkPackageManhour(Builder $query)
    {
        return $query->where('of', 'project-workpackage-manhour');
    }

    /**
     * Scope a query to only include type of Purchase Request.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPurchaseRequest(Builder $query)
    {
        return $query->where('of', 'purchase-request');
    }

    /**
     * Scope a query to only include type of Quotation Item.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfQuotationItemCost(Builder $query)
    {
        return $query->where('of', 'quotation-item-cost');
    }

    /**
     * Scope a query to only include type of Regulator.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRegulator(Builder $query)
    {
        return $query->where('of', 'regulator');
    }

    /**
     * Scope a query to only include type of RIR's General Document.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfGender(Builder $query)
    {
        return $query->where('of', 'gender');
    }

    /**
     * Scope a query to only include type of RIR's General Document.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRIRGeneralDocument(Builder $query)
    {
        return $query->where('of', 'rir-general-document');
    }

    /**
     * Scope a query to only include type of RIR's Material Check Condition.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRIRMaterialCheckCondition(Builder $query)
    {
        return $query->where('of', 'rir-material-condition');
    }

    /**
     * Scope a query to only include type of RIR's Material Check Identification.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRIRMaterialCheckIdentification(Builder $query)
    {
        return $query->where('of', 'rir-material-identification');
    }

    /**
     * Scope a query to only include type of RIR's Material Check Quality.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRIRMaterialCheckQuality(Builder $query)
    {
        return $query->where('of', 'rir-material-quality');
    }

    /**
     * Scope a query to only include type of RIR's Packing and Handling Check Condition.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRIRPackingAndHandlingCheckCondition(Builder $query)
    {
        return $query->where('of', 'rir-packing-handling-condition');
    }

    /**
     * Scope a query to only include type of RIR's Packing and Handling Check Type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRIRPackingAndHandlingCheckType(Builder $query)
    {
        return $query->where('of', 'rir-packing-handling-type');
    }

    /**
     * Scope a query to only include type of RIR's Preservation Check.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRIRPreservationCheck(Builder $query)
    {
        return $query->where('of', 'rir-preservation-check');
    }

    /**
     * Scope a query to only include type of RIR's Technical Document.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRIRTechnicalDocument(Builder $query)
    {
        return $query->where('of', 'rir-technical-document');
    }

    /**
     * Scope a query to only include type of Scheduled Payment.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfScheduledPayment(Builder $query)
    {
        return $query->where('of', 'scheduled-payment');
    }

    /**
     * Scope a query to only include type of School Degree.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfSchoolDegree(Builder $query)
    {
        return $query->where('of', 'school-degree');
    }

    /**
     * Scope a query to only include type of Task Card EO's Manual Affected.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardEOManualAffected(Builder $query)
    {
        return $query->where('of', 'taskcard-eo-manual-affected');
    }

    /**
     * Scope a query to only include type of Task Card EO's Recurrence.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardEORecurrence(Builder $query)
    {
        return $query->where('of', 'taskcard-eo-recurrence');
    }

    /**
     * Scope a query to only include type of Task Card EO's Scheduled Priority.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardEOScheduledPriority(Builder $query)
    {
        return $query->where('of', 'taskcard-eo-scheduled-priority');
    }

    /**
     * Scope a query to only include type of TaskCard's skill.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardSkill(Builder $query)
    {
        return $query->where('of', 'taskcard-skill');
    }

    /**
     * Scope a query to only include type of TaskCard's task.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardTask(Builder $query)
    {
        return $query->where('of', 'taskcard-task');
    }

    /**
     * Scope a query to only include type of TaskCard's type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardTypeRoutine(Builder $query)
    {
        return $query->where('of', 'taskcard-type-routine');
    }

    /**
     * Scope a query to only include type of TaskCard's type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardTypeNonRoutine(Builder $query)
    {
        return $query->where('of', 'taskcard-type-non-routine')
                     ->where('code', '<>', 'si')
                     ->where('code', '<>', 'preliminary')
                     ->where('code', '<>', 'htcrr');
    }

    /**
     * Scope a query to only include type of TaskCard's type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardTypeSI(Builder $query)
    {
        return $query->where('of', 'taskcard-type-non-routine')
                     ->where('code', 'si');
    }

    /**
     * Scope a query to only include type of TaskCard's type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardTypePreliminary(Builder $query)
    {
        return $query->where('of', 'taskcard-type-non-routine')
                     ->where('code', 'preliminary');
    }

    /**
     * Scope a query to only include type of Tax.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTax(Builder $query)
    {
        return $query->where('of', 'tax');
    }

    /**
     * Scope a query to only include type of Tax payment method.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaxPaymentMethod(Builder $query)
    {
        return $query->where('of', 'tax-payment-method');
    }

    /**
     * Scope a query to only include type of Term of Payment.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTermOfPayment(Builder $query)
    {
        return $query->where('of', 'term-of-payment');
    }

    /**
     * Scope a query to only include type of Unit.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfUnit(Builder $query)
    {
        return $query->where('of', 'unit');
    }

    /**
     * Scope a query to only include type of Website.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfWebsite(Builder $query)
    {
        return $query->where('of', 'website');
    }

    /**
     * Scope a query to only include type of Aircraft Work Area.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfWorkArea(Builder $query)
    {
        return $query->where('of', 'work-area');
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An attendance correction may have zero or many type.
     *
     * This function will retrieve all addresses of a type.
     * See: Address's type() method for the inverse
     *
     * @return mixed
     */
    public function attendance_correction()
    {
        return $this->hasMany(AttendanceCorrection::class);
    }

    /**
     * One-to-Many: An address may have zero or many type.
     *
     * This function will retrieve all addresses of a type.
     * See: Address's type() method for the inverse
     *
     * @return mixed
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * One-to-Many: A document may have zero or many type.
     *
     * This function will retrieve all documents of a type.
     * See: Document's type() method for the inverse
     *
     * @return mixed
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * One-to-Many: An email may have zero or many type.
     *
     * This function will retrieve all emails of a type.
     * See: Email's type() method for the inverse
     *
     * @return mixed
     */
    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    /**
     * One-to-Mant: A gender have zero or many Employees.
     *
     * This function will retrieve Project of a given RTS.
     * See: Employee's gender() method for the inverse
     *
     * @return mixed
     */
    public function employee_gender()
    {
        return $this->hasMany(Employee::class, 'gender_id');
    }

    /**
     * One-to-Many: A fax may have zero or many type.
     *
     * This function will retrieve all faxes of a type.
     * See: Email's type() method for the inverse
     *
     * @return mixed
     */
    public function faxes()
    {
        return $this->hasMany(Fax::class);
    }

    /**
     * One-to-Many: A jobcard may have zero or many logbook.
     *
     * This function will retrieve all jobcards of a type.
     * See: JobCard's logbooks() method for the inverse
     *
     * @return mixed
     */
    public function logbook_jobcards()
    {
        return $this->belongsToMany(JobCard::class, 'jobcard_logbooks', 'logbook_id', 'jobcard_id')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A phone may have zero or many type.
     *
     * This function will retrieve all phones of a type.
     * See: Phone's type() method for the inverse
     *
     * @return mixed
     */
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    /**
     * One-to-Many: A defect card may have zero or many propose correction.
     *
     * This function will retrieve all defect cards of a type.
     * See: DefectCard's propose_corrections() method for the inverse
     *
     * @return mixed
     */
    public function propose_correction_defectcards()
    {
        return $this->belongsToMany(DefectCard::class, 'defectcard_propose_correction', 'propose_correction_id', 'defectcard_id')
                    ->withPivot('propose_correction_text')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A purchase request may have zero or many type.
     *
     * This function will retrieve all purchase requests of a type.
     * See: PurchaseRequest's type() method for the inverse
     *
     * @return mixed
     */
    public function purchase_requests()
    {
        return $this->hasMany(PurchaseRequest::class);
    }

    /**
     * One-to-Many: A repeat may have zero or many type.
     *
     * This function will retrieve all repeats of a type.
     * See: Repeat's type() method for the inverse
     *
     * @return mixed
     */
    public function repeats()
    {
        return $this->hasMany(Repeat::class);
    }

    /**
     * Many-to-Many: A Defect Card may have zero or many skill.
     *
     * This function will retrieve all Defect Card's skills of a type.
     * See: DefectCard's skills() method for the inverse
     *
     * @return mixed
     */
    public function skill_defectcards()
    {
        return $this->belongsToMany(DefectCard::class, 'defectcard_skill', 'skill_id', 'defectcard_id')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A task card may have zero or many skill.
     *
     * This function will retrieve all task card skills of a type.
     * See: EOInstruction's skills() method for the inverse
     *
     * @return mixed
     */
    public function skill_eo_instructions()
    {
        return $this->belongsToMany(EOInstruction::class, 'eo_instruction_skill', 'skill_id', 'eo_instruction_id')
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: An HTCRR may have zero or many skill.
     *
     * This function will retrieve all HTCRR skills of a type.
     * See: HtCrr's skills() method for the inverse
     *
     * @return mixed
     */
    public function skill_htcrrs()
    {
        return $this->belongsToMany(HtCrr::class, 'htcrr_skill', 'skill_id', 'htcrr_id')
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A task card may have zero or many skill.
     *
     * This function will retrieve all task card skills of a type.
     * See: TaskCard's skills() method for the inverse
     *
     * @return mixed
     */
    public function skill_taskcards()
    {
        return $this->belongsToMany(TaskCard::class, 'skill_taskcard', 'skill_id', 'taskcard_id')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A task card may have zero or many task.
     *
     * This function will retrieve all task cards of a task.
     * See: TaskCard's task() method for the inverse
     *
     * @return mixed
     */
    public function task_taskcards()
    {
        return $this->hasMany(TaskCard::class, 'task_id', 'id');
    }

    /**
     * One-to-Many: An HTCRR may have zero or many type.
     *
     * This function will retrieve all HTCRRs of a type.
     * See: HtCrr's type() method for the inverse
     *
     * @return mixed
     */
    public function type_htcrrs()
    {
        return $this->hasMany(HtCrr::class, 'type_id', 'id');
    }

    /**
     * One-to-Many: A Company may have zero or many type.
     *
     * This function will retrieve all Companies of a type.
     * See: Company's type() method for the inverse
     *
     * @return mixed
     */
    public function type_companies()
    {
        return $this->hasMany(Company::class, 'type_id', 'id');
    }

    /**
     * One-to-Many: A Department may have zero or many type.
     *
     * This function will retrieve all Departments of a type.
     * See: Department's type() method for the inverse
     *
     * @return mixed
     */
    public function type_departments()
    {
        return $this->hasMany(Department::class, 'type_id', 'id');
    }

    /**
     * One-to-Many: A task card may have zero or many type.
     *
     * This function will retrieve all task cards of a type.
     * See: TaskCard's type() method for the inverse
     *
     * @return mixed
     */
    public function type_taskcards()
    {
        return $this->hasMany(TaskCard::class, 'type_id', 'id');
    }

    /**
     * One-to-Many: A threshold may have zero or many type.
     *
     * This function will retrieve all thresholds of a type.
     * See: Threshold's type() method for the inverse
     *
     * @return mixed
     */
    public function thresholds()
    {
        return $this->hasMany(Threshold::class);
    }

    /**
     * One-to-Many: A unit may have zero or many type.
     *
     * This function will retrieve all units of a type.
     * See: Unit's type() method for the inverse
     *
     * @return mixed
     */
    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    /**
     * One-to-Many: A website may have zero or many type.
     *
     * This function will retrieve all websites of a type.
     * See: Website's type() method for the inverse
     *
     * @return mixed
     */
    public function websites()
    {
        return $this->hasMany(Website::class);
    }
}
