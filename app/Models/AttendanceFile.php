<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceFile extends Model
{
    protected $table = 'attendance_files';

    protected $fillable = [
        'uuid',
        'imported_by',
        'name',
        'filename',
        'path'
    ];
}
