<?php

namespace App\Models;

use App\MemfisModel;

class Storage extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'is_active',
        'description',
        'account_code',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: A storage can be filled from many entities.
     *
     * This function will get all the company's Branches that are filled to a given storage.
     * See: Branch's storages() method for the inverse
     *
     * @return mixed
     */
    public function branches()
    {
        return $this->morphedByMany(Branch::class, 'storageable');
    }

    /**
     * M-M Polymorphic: A storage can be filled from many entities.
     *
     * This function will get all the Companies that are filled to a given storage.
     * See: Company's storages() method for the inverse
     *
     * @return mixed
     */
    public function companies()
    {
        return $this->morphedByMany(Company::class, 'storageable');
    }

    /**
     * One-to-Many: A GRN may have one storage.
     *
     * This function will retrieve all the GRNs of a storage.
     * See: GoodsReceived's storage() method for the inverse
     *
     * @return mixed
     */
    public function goods_receiveds()
    {
        return $this->hasMany(GoodsReceived::class);
    }

    /**
     * Many-to-Many: An item may have zero or many storage.
     *
     * This function will retrieve the items of a storage.
     * See: Item's storages() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot('min', 'max')
                    ->withTimestamps();
    }
}
