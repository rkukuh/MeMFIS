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

    protected $dates = ['versioned_at']
}
