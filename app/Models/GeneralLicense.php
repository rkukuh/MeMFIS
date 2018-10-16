<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GeneralLicense extends Pivot
{
    protected $fillable = [
        'aviation_degree',
        'aviation_degree_code',
        'exam_no',
        'exam_date',
        'attendance_no',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    //
}
