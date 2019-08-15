<?php

namespace App\Models;

use App\MemfisModel;

class BPJS extends MemfisModel
{
    protected $table = 'bpjs';

    protected $fillable = [
        'code',
        'name',
        'employee_paid',
        'employee_min_value',
        'employee_max_value',
        'company_paid',
        'company_min_value',
        'company__max_value'
    ];
}
