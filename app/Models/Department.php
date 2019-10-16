<?php

namespace App\Models;

use App\MemfisModel;

class Department extends MemfisModel
{
    protected $fillable = [
        'code',
        'company_id',
        'parent_id',
        'type_id',
        'name',
        'maximum_period',
        'maximum_holiday',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many (self-join): A Department may have none or many sub-Department.
     *
     * This function will retrieve the sub-Department of an Department, if any.
     * See: Department's parent() method for the inverse
     *
     * @return mixed
     */
    public function childs()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }

    /**
     * One-to-Many: A Company may have one or many departments.
     *
     * This function will retrieve the Company of a given Department.
     * See: Company's departments() method for the inverse
     *
     * @return mixed
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * One-to-Many (self-join): A Department may have none or many sub-Department.
     *
     * This function will retrieve the parent of a sub-Department.
     * See: Department's childs() method for the inverse
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    /**
     * M-M Polymorphic: A storage can be filled from many entities.
     *
     * This function will get all the storages that are filled from a given Department.
     * See: Storage's departments() method for the inverse
     *
     * @return mixed
     */
    public function storages()
    {
        return $this->morphToMany(Storage::class, 'storageable');
    }

    /**
     * One-to-Many: A Department may have zero or many type.
     *
     * This function will retrieve the type of an Department.
     * See: Type's type_departments() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
