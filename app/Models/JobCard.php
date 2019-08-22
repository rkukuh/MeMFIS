<?php

namespace App\Models;

use App\MemfisModel;

class JobCard extends MemfisModel
{
    protected $table = 'jobcards';

    protected $fillable = [
        'number',
        'jobcardable_type',
        'jobcardable_id',
        'quotation_id',
        'is_rii',
        'is_mandatory',
        'station_id',
        'entered_in',
        'additionals',
        'origin_quotation',
        'origin_jobcardable',
        'origin_jobcardable_items',
        'origin_jobcard_helpers',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all JobCard's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * One-to-Many: A Job Card may have none or many Defect Card.
     *
     * This function will retrieve all the Defect Cards of a given Job Card.
     * See: DefectCard's jobcard() method for the inverse
     *
     * @return mixed
     */
    public function defectcards()
    {
        return $this->hasMany(DefectCard::class, 'jobcard_id');
    }

    /**
     * One-Way: A job card may have one logbook (to be entered).
     *
     * This function will retrieve the logbook (to be entered) of a job card.
     *
     * @return mixed
     */
    public function entered_in()
    {
        return $this->belongsTo(Type::class, 'entered_in');
    }

    /**
     * Many-to-Many: A JobCard may have zero or many helper.
     *
     * This function will retrieve all the helpers of a JobCard.
     * See: Employee's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function helpers()
    {
        return $this->belongsToMany(Employee::class, 'employee_jobcard', 'jobcard_id', 'employee_id')
                    ->withTimestamps();;
    }

    /**
     * Polymorphic: An entity can have zero or many inspections.
     *
     * This function will get all JobCard's inspections.
     * See: Inspection's inspectable() method for the inverse
     *
     * @return mixed
     */
    public function inspections()
    {
        return $this->morphMany(Progress::class, 'inspectable');
    }

    /**
     * Polymorphic: An entity can have zero or many jobcards.
     *
     * This function will get all of the owning jobcardable models.
     * See:
     * - TaskCard's jobcards() method for the inverse
     * - EOInstruction's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function jobcardable()
    {
        return $this->morphTo();
    }

    /**
     * Polymorphic: An entity can have zero or many progresses.
     *
     * This function will get all JobCard's progresses.
     * See: Progress's progressable() method for the inverse
     *
     * @return mixed
     */
    public function progresses()
    {
        return $this->morphMany(Progress::class, 'progressable');
    }

    /**
     * One-to-Many: A jobcard must related to a quotation
     *
     * This function will retrieve the quotation of a jobcard.
     * See: Quotation's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * One-to-Many: A jobcard may related to an A/C station
     *
     * This function will retrieve the A/C station of a jobcard.
     * See: Station's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    /**
     * Polymorphic: An entity can have zero or many statuses.
     *
     * This function will get all of the jobcard's statuses.
     * See: Access's accessable() method for the inverse
     *
     * @return mixed
     */
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusable');
    }
}
