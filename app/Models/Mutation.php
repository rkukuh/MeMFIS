<?php

namespace App\Models;

use App\MemfisModel;

class Mutation extends MemfisModel
{
    protected $fillable = [
        'number',
        'storage_out',
        'storage_in',
        'mutated_at',
        'shipping_by',
        'received_by',
        'note',
    ];

    protected $dates = ['mutated_at'];

    /*************************************** RELATIONSHIP ****************************************/

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

    /**
     * M-M Polymorphic: A branch can be applied to many entities.
     *
     * This function will get all the branches that are applied to a given Mutation.
     * See: Branch's mutations() method for the inverse
     *
     * @return mixed
     */
    public function branches()
    {
        return $this->morphToMany(Branch::class, 'branchable');
    }

    /**
     * One-Way: A Mutation may have one Storage in.
     *
     * This function will retrieve the Storage in of a Mutation.
     *
     * @return mixed
     */
    public function storage_in()
    {
        return $this->belongsTo(Storage::class, 'storage_in');
    }

    /**
     * One-Way: A Mutation may have one Storage out.
     *
     * This function will retrieve the Storage out of a Mutation.
     *
     * @return mixed
     */
    public function storage_out()
    {
        return $this->belongsTo(Storage::class, 'storage_out');
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
        return $this->belongsToMany(Item::class, 'item_mutation', 'mutation_id', 'item_id')
            ->withPivot(
                'serial_number',
                'quantity',
                'quantity_in_primary_unit',
                'unit_id',
                'purchased_price',
                'total',
                'note'
            )
            ->withTimestamps();
    }
}
