<?php

namespace App\Models;

use App\MemfisModel;

class Fax extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'is_primary',
        'faxable_id',
        'faxable_type',
    ];
}
