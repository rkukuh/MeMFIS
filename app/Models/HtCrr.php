<?php

namespace App\Models;

use App\MemfisModel;

class HtCrr extends MemfisModel
{
    protected $table = 'htcrr';

    protected $fillable = [
        'code',
        'part_number',
        'skill_id',
        'is_rii',
        'estimation_manhour',
        'removed_at',
        'removed_by',
        'installed_at',
        'installed_by',
        'description',
    ];

    protected $dates = [
        'removed_at',
        'installed_at',
    ];
}
