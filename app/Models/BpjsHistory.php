<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BpjsHistory extends Model
{
    protected $table = 'bpjs_histories';

    protected $fillable = [
        'bpjs_id',
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
     * See: BPJS history() method for the inverse
     *
     * @return mixed
     */
    public function bpjs()
    {
        return $this->belongsTo(BPJS::class);
    }
}
