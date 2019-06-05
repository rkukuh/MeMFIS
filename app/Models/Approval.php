<?php

namespace App\Models;

use App\MemfisModel;

class Approval extends MemfisModel
{
    protected $fillable = [
        'approvable_type',
        'approvable_id',
        'approved_by',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all of the owning approvable models.
     * See:
     * - Quotation's approvals() method for the inverse
     * - JobCard's approvals() method for the inverse
     * - DefectCard's approvals() method for the inverse
     * - GoodReceive's approvals() method for the inverse
     * - PurchaseRequest's approvals() method for the inverse
     * - PurchaseOrder's approvals() method for the inverse
     */
    public function approvable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: An approval (of anything) may have one approver.
     *
     * This function will retrieve the approver of a given approval (of anything).
     * See: Employee's approvals() method for the inverse
     *
     * @return mixed
     */
    public function approvedBy()
    {
        return $this->belongsTo(Employee::class, 'approved_by');
    }
}
