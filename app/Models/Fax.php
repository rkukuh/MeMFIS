<?php

namespace App\Models;

use App\MemfisModel;

class Fax extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'is_active',
        'faxable_type',
        'faxable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A fax may have zero or many types.
     *
     * This function will retrieve the type of an fax.
     * See: Type's faxes() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Polymorphic: An entity can have zero or many faxes.
     *
     * This function will get all of the owning addressable models.
     * See:
     * - Customer's faxes() method for the inverse
     * - Employee's faxes() method for the inverse
     */
    public function faxable()
    {
        return $this->morphTo();
    }
}
