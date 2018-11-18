<?php

namespace App\Models;

use App\MemfisModel;

class Note extends MemfisModel
{
    protected $fillable = [
        'body',
        'noteable_id',
        'noteable_type',
    ];
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity may have zero or many note.
     *
     * This function will get all of the owning noteable models.
     * See:
     * - ?
     */
    public function noteable()
    {
        return $this->morphTo();
    }
}
