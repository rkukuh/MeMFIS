<?php

namespace App\Models;

use App\MemfisModel;

class ItemRequest extends MemfisModel
{
    protected $table = 'requests';

    protected $fillable = [
        'number',
        'type_id',
        'requestable_type',
        'requestable_id',
        'requested_at',
        'storage_id',
        'received_by',
        'section',
        'note',
    ];

    protected $dates = ['requested_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: A branch can be applied to many entities.
     *
     * This function will get all the branches that are applied to a given Item Request.
     * See: Branch's item_requests() method for the inverse
     *
     * @return mixed
     */
    public function branches()
    {
        return $this->morphToMany(Branch::class, 'branchable');
    }

    /**
     * One-to-Many: A gse may have one request.
     *
     * This function will retrieve all the gses of a request.
     * See: GSE's request() method for the inverse
     *
     * @return mixed
     */
    public function gses()
    {
        return $this->hasMany(GSE::class);
    }

    /**
     * Many-to-Many: A GSE may have zero or many item.
     *
     * This function will retrieve all the items of a GSE.
     * See: Item's gse() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_request','request_id','item_id')
                    ->withPivot(
                        'serial_number',
                        'quantity',
                        'unit_id',
                        'interchange_id',
                        'note'
                    )
                    ->withTimestamps();
    }

    /**
     * One-Way: An Item Request may have one receiver.
     *
     * This function will retrieve the receiver of an Item Request.
     *
     * @return mixed
     */
    public function receivedBy()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Polymorphic: An entity can have zero or many ItemRequest.
     *
     * This function will get all of the owning requestable models.
     * See:
     * - ???
     *
     * @return mixed
     */
    public function requestable()
    {
        return $this->morphTo();
    }

    /**
     * One-Way: An Item Request may have one Storage.
     *
     * This function will retrieve the Storage in of an Item Request.
     *
     * @return mixed
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all GoodsReceived's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }
}
