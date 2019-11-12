<?php

namespace App\Models;

use App\MemfisModel;

class AttendanceCorrection extends MemfisModel
{
    // protected $table = 'attendancecorrections';

    protected $fillable = [
        'imported_by',
        'name',
        'filename',
        'path'
    ];
}
