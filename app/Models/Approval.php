<?php

namespace App\Models;

use App\MemfisModel;

class Approval extends MemfisModel
{
    protected $fillable = [
        'approvable_type',
        'approvable_id',
        'is_approved',
        'conducted_by',
        'note',
        'created_at'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all of the owning approvable models.
     * See:
     * - DefectCard's approvals() method for the inverse
     * - GoodsReceive's approvals() method for the inverse
     * - JobCard's approvals() method for the inverse
     * - Quotation's approvals() method for the inverse
     * - Overtime's approvals() method for the inverse
     * - Project's approvals() method for the inverse
     * - PurchaseOrder's approvals() method for the inverse
     * - PurchaseRequest's approvals() method for the inverse
     * - RTS's approvals() method for the inverse
     *
     * @return mixed
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
    public function conductedBy()
    {
        return $this->belongsTo(Employee::class, 'conducted_by');
    }
}
