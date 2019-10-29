<?php

namespace App\Models;

use App\MemfisModel;

class ItemRequest extends MemfisModel
{
    protected $table = 'requests';
    
    protected $fillable = [
        'number',
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
}
