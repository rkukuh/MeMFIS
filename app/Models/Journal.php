<?php

namespace App\Models;

use App\MemfisModel;

class Journal extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'type_id',
        'level',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A journal may have zero or many type.
     *
     * This function will retrieve the type of a journal.
     * See: Type's journals() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
