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
     * One-to-Many: A task card may have zero or many version.
     *
     * This function will retrieve all task cards of a version.
     * See: Task Card's version() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->hasMany(TaskCard::class);
    }
}
