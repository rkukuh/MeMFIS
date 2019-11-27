<?php

namespace App\Models;

use App\MemfisModel;

class RIR extends MemfisModel
{
    protected $table = 'rir';

    protected $fillable = [
        'number',
        'rir_date',
        'vehicle_no',
        'delivery_document_number',
        'status_id',
        'purchase_order_id',
        'vendor_id',
        'packing_type',
        'packing_condition',
        'unsatisfactory_packing',
        'preservation_check',
        'unsatisfactory_preservation',
        'material_condition',
        'material_identification',
        'material_quality',
        'unsatisfactory_material',
        'unsatisfactory_document',
        'received_by',
        'received_at',
        'decision',
        'description',
    ];

    protected $dates = ['received_at'];

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
     * Many-to-Many: A RIR may have zero or many item.
     *
     * This function will retrieve all the items of a RIR.
     * See: Item's rir() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'rir_item','rir_id','item_id')
                    ->withPivot(
                        'serial_number',
                        'quantity',
                        'quantity_unit',
                        'unit_id',
                        'price',
                        'already_received_amount',
                        'note',
                        'expired_at'
                    )
                    ->withTimestamps();
    }

    /**
     * One-Way: An RIR may have one packing condition.
     *
     * This function will retrieve the packing condition of an RIR.
     *
     * @return mixed
     */
    public function packingCondition()
    {
        return $this->belongsTo(Type::class, 'packing_condition');
    }

    /**
     * One-Way: An RIR may have one packing type.
     *
     * This function will retrieve the packing type of an RIR.
     *
     * @return mixed
     */
    public function packingType()
    {
        return $this->belongsTo(Type::class, 'packing_type');
    }

    /**
     * One-Way: An RIR may have one preservation check.
     *
     * This function will retrieve the preservation check of an RIR.
     *
     * @return mixed
     */
    public function preservationCheck()
    {
        return $this->belongsTo(Type::class, 'preservation_check');
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
