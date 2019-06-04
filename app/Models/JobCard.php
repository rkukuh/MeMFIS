<?php

namespace App\Models;

use App\MemfisModel;

class JobCard extends MemfisModel
{
    protected $table = 'jobcards';

    protected $fillable = [
        'number',
        'taskcard_id',
        'quotation_id',
        'data_taskcard',
        'data_taskcard_items',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all Quotation's approvals.
     * See: Approvals's approvable() method for the inverse
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
     * Polymorphic: An entity can have zero or many statuses.
     *
     * This function will get all of the jobcard's statuses.
     * See: Access's accessable() method for the inverse
     */
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusable');
    }

    /**
     * One-to-Many (with JSON data): A jobcard must have a taskcard
     *
     * This function will retrieve the taskcard of a jobcard.
     * See: TaskCard's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function taskcard()
    {
        return $this->belongsTo(TaskCard::class);
    }
}
