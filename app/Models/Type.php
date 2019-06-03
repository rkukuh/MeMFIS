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
     * Scope a query to only include type of Journal.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfJournal(Builder $query)
    {
        return $query->where('of', 'journal');
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
     * One-to-Many: A journal may have zero or many type.
     *
     * This function will retrieve all journals of a type.
     * See: Journal's type() method for the inverse
     *
     * @return mixed
     */
    public function journals()
    {
        return $this->hasMany(Journal::class);
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
     * One-to-Many: A task card may have zero or many type.
     *
     * This function will retrieve all task cards of a type.
     * See: TaskCard's type() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->hasMany(TaskCard::class);
    }

    /**
     * One-to-Many: A task card may have zero or many task.
     *
     * This function will retrieve all task cards of a task.
     * See: TaskCard's task() method for the inverse
     *
     * @return mixed
     */
    public function taskcard_tasks()
    {
        return $this->hasMany(TaskCard::class, 'task_id', 'id');
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
