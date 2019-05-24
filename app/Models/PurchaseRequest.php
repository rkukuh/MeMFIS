<?php

namespace App\Models;

use App\MemfisModel;

class PurchaseRequest extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'requested_at',
        'required_at',
        'approved_by',
        'approved_at',
        'project_id',
        'description',
    ];

    protected $dates = [
        'requested_at', 
        'required_at', 
        'approved_at'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A purchase request may have approver.
     *
     * This function will retrieve the approver of a purchase request.
     * See: Employee's purchase_request_approved() method for the inverse
     *
     * @return mixed
     */
    public function approvedBy()
    {
        return $this->belongsTo(Employee::class, 'approved_by');
    }

    /**
     * Many-to-Many: A purchase request may have zero or many item.
     *
     * This function will retrieve all the items of a purchase request.
     * See: Item's purchase_requests() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot(
                        'quantity',
                        'unit_id',
                        'note'
                    )
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A purchase request may have zero or one project
     *
     * This function will retrieve the project of a purchase request.
     * See: Project's purchase_requests() method for the inverse
     *
     * @return mixed
     */
    public function project()
    {
        return $this->belongsTo(Project::class)
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A purchase order may have one purchase request.
     *
     * This function will retrieve all the purchase orders of a purchase request.
     * See: PurchaseOrder's purchase_request() method for the inverse
     *
     * @return mixed
     */
    public function purchase_orders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    /**
     * One-to-Many: A task card may have zero or many type.
     *
     * This function will retrieve the type of an task card.
     * See: Type's purchase_requests() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
