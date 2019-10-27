<?php

namespace App\Models;

use App\MemfisModel;

class RIR extends MemfisModel
{
    protected $table = 'rir';

    protected $fillable = [
        'number',
        'rir_date',
        'purchase_order_id',
        'vendor_id',
        'received_by',
        'vehicle_no',
        'delivery_document_number',
        'decision',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all RIR's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * M-M Polymorphic: A branch can be applied to many entities.
     *
     * This function will get all the branches that are applied to a given RIR.
     * See: Branch's rirs() method for the inverse
     *
     * @return mixed
     */
    public function branches()
    {
        return $this->morphToMany(Branch::class, 'branchable');
    }

    /**
     * One-Way: An RIR may have one Purchase Order.
     *
     * This function will retrieve the Purchase Order of an RIR.
     *
     * @return mixed
     */
    public function purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    /**
     * One-Way: An RIR may have one receiver.
     *
     * This function will retrieve the receiver of an RIR.
     *
     * @return mixed
     */
    public function receivedBy()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * One-Way: An RIR may have one Status.
     *
     * This function will retrieve the Status of an RIR.
     *
     * @return mixed
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * One-Way: An RIR may have one Vendor.
     *
     * This function will retrieve the vendor of an RIR.
     *
     * @return mixed
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
