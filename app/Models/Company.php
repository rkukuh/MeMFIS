<?php

namespace App\Models;

use App\MemfisModel;

class Company extends MemfisModel
{
    protected $fillable = [
        'code',
        'parent_id',
        'type_id',
        'name',
        'maximum_period',
        'maximum_holiday',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many bank accounts.
     *
     * This function will get all Company's bank accounts.
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
     * This function will retrieve all the branches of a given company.
     * See: Branch's company() method for the inverse
     *
     * @return mixed
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    /**
     * One-to-Many (self-join): A Company may have none or many sub-Company.
     *
     * This function will retrieve the sub-Company of an Company, if any.
     * See: Company's parent() method for the inverse
     *
     * @return mixed
     */
    public function childs()
    {
        return $this->hasMany(Company::class, 'parent_id');
    }

    /**
     * One-to-Many: A Company may have one or many departments.
     *
     * This function will retrieve all the Departments of a given Company.
     * See: Department's company() method for the inverse
     *
     * @return mixed
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    /**
     * One-to-Many (self-join): A Company may have none or many sub-Company.
     *
     * This function will retrieve the parent of a sub-Company.
     * See: Company's childs() method for the inverse
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(Company::class, 'parent_id');
    }

    /**
     * M-M Polymorphic: A storage can be filled from many entities.
     *
     * This function will get all the storages that are filled from a given Company.
     * See: Storage's companies() method for the inverse
     *
     * @return mixed
     */
    public function storages()
    {
        return $this->morphToMany(Storage::class, 'storageable');
    }

    /**
     * One-to-Many: A Company may have zero or many type.
     *
     * This function will retrieve the type of an Company.
     * See: Type's type_companys() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
