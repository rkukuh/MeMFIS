<?php

namespace App\Models;

use App\MemfisModel;

class PurchaseRequest extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'category_id',
        'purchase_requestable_type',
        'purchase_requestable_id',
        'requested_at',
        'required_at',
        'description',
    ];

    protected $dates = [
        'requested_at',
        'required_at',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all PurchaseRequest's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * One-to-Many: A purchase request have zero or many category.
     *
     * This function will retrieve the type of an purchase request.
     * See: Type's purchase_requests() method for the inverse
     *
     * @return mixed
     */
    public function category()
    {
        return $this->belongsTo(Type::class);
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
        return $this->belongsToMany(Item::class, 'item_purchase_request', 'purchase_request_id', 'item_id')
                    ->withPivot(
                        'quantity_requirement',
                        'quantity',
                        'quantity_unit',
                        'unit_id',
                        'note'
                    )
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A purchase request may have zero or many item.
     *
     * This function will retrieve all the services of a purchase request.
     * See: Item's purchase_requests() method for the inverse
     *
     * @return mixed
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'purchase_request_service', 'purchase_request_id', 'service_id')
                    ->withPivot(
                        'quantity_requirement',
                        'quantity',
                        'quantity_unit',
                        'unit_id',
                        'note'
                    )
                    ->withTimestamps();
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
     * Polymorphic: An entity can have zero or many purchase requests.
     *
     * This function will get all of the owning purchase_requestable models.
     * See:
     * - Project's purchase_requests() method for the inverse
     *
     * @return mixed
     */
    public function purchase_requestable()
    {
        return $this->morphTo();
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
