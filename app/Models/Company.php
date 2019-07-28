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
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

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
