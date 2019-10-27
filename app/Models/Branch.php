<?php

namespace App\Models;

use App\MemfisModel;

class Branch extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many bank accounts.
     *
     * This function will get all Branch's bank accounts.
     * See: BankAccount's bank_accountable() method for the inverse
     *
     * @return mixed
     */
    public function bank_accounts()
    {
        return $this->morphMany(BankAccount::class, 'bank_accountable');
    }

    /**
     * One-to-Many: A company may have zero or many branches.
     *
     * This function will retrieve the company of a given branch.
     * See: Company's branches() method for the inverse
     *
     * @return mixed
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * M-M Polymorphic: A branch can be applied to many entities.
     *
     * This function will get all the InventoryIns that are applied by a given branch.
     * See: InventoryIn's branches() method for the inverse
     *
     * @return mixed
     */
    public function inventory_ins()
    {
        return $this->morphedByMany(InventoryIn::class, 'branchable');
    }

    /**
     * M-M Polymorphic: A branch can be applied to many entities.
     *
     * This function will get all the Item Requests that are applied by a given branch.
     * See: ItemRequest's branches() method for the inverse
     *
     * @return mixed
     */
    public function item_requests()
    {
        return $this->morphedByMany(ItemRequest::class, 'branchable');
    }

    /**
     * M-M Polymorphic: A branch can be applied to many entities.
     *
     * This function will get all the Mutations that are applied by a given branch.
     * See: Mutation's branches() method for the inverse
     *
     * @return mixed
     */
    public function mutations()
    {
        return $this->morphedByMany(Mutation::class, 'branchable');
    }

    /**
     * M-M Polymorphic: A storage can be filled from many entities.
     *
     * This function will get all the Projects that are applied by a given branch.
     * See: Project's branches() method for the inverse
     *
     * @return mixed
     */
    public function projects()
    {
        return $this->morphToMany(Project::class, 'branchable');
    }

    /**
     * M-M Polymorphic: A storage can be filled from many entities.
     *
     * This function will get all the storages that are filled from a given company's branch.
     * See: Storage's branches() method for the inverse
     *
     * @return mixed
     */
    public function storages()
    {
        return $this->morphToMany(Storage::class, 'storageable');
    }
}
