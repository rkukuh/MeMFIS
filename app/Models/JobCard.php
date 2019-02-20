<?php

namespace App\Models;

use App\MemfisModel;

class JobCard extends MemfisModel
{
    protected $table = 'jobcards';

    protected $fillable = [
        'number',
        'taskcard_id',
        'data_taskcard',
        'data_taskcard_items',
    ];
}
