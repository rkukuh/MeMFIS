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
        'company__max_value',
        'created_at',
        'updated_at'
    ];

    /**
     * One-to-Many: A BPJS may have one or many history.
     *
     * This function will retrieve all the history of a given BPJS.
     * See: BpjsHistory bpjs() method for the inverse
     *
     * @return mixed
     */
    public function history()
    {
        return $this->hasMany(BpjsHistory::class);
    }
}
