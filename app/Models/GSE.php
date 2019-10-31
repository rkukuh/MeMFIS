<?php

namespace App\Models;

use App\MemfisModel;

class GSE extends MemfisModel
{
    protected $table = 'gse';

    protected $fillable = [
        'number',
        'request_id',
        'storage_id',
        'returned_at',
        'returned_by',
        'section',
        'note',
    ];

    protected $dates = [
        'returned_at',
        'received_at'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: A branch can be applied to many entities.
     *
     * This function will get all the branches that are applied to a given GSE.
     * See: Branch's gses() method for the inverse
     *
     * @return mixed
     */
    public function branches()
    {
        return $this->morphToMany(Branch::class, 'branchable');
    }

    /**
     * One-Way: A GSE may have one receiver.
     *
     * This function will retrieve the receiver of a GSE.
     *
     * @return mixed
     */
    public function returnBy()
    {
        return $this->belongsTo(Employee::class, 'returned_by');
    }

    /**
     * One-to-Many: A GSE may have one request.
     *
     * This function will retrieve the request of a GSE.
     * See: GSE's gses() method for the inverse
     *
     * @return mixed
     */
    public function request()
    {
        return $this->belongsTo(ItemRequest::class);
    }

    /**
     * One-Way: A GSE may have one Storage.
     *
     * This function will retrieve the Storage in of a GSE.
     *
     * @return mixed
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
}
