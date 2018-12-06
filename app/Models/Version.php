<?php

namespace App\Models;

use App\MemfisModel;

class Version extends MemfisModel
{
    protected $fillable = [
        'number',
        'change_log',
        'versioned_at',
        'versionable_id',
        'versionable_type',
    ];

    protected $dates = ['versioned_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many versions.
     *
     * This function will get all of the owning versionable models.
     * See:
     * - Task Card's versions() method for the inverse
     */
    public function versionable()
    {
        return $this->morphTo();
    }
}
