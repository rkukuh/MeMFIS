<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeBPJS extends Model
{
    protected $table = 'employee_bpjs';
    public $timestamps = false;
    protected $fillable = [
        'employee_id',
        'bpjs_id',
        'employee_paid',
        'employee_min_value',
        'employee_max_value',
        'company_paid',
        'company_min_value',
        'company_max_value',
        'created_at',
        'updated_at',
        'approved_at',
        'deleted_at'
    ];
    

    /**
     * One-to-Many: An EmployeeBpjs have many Employee.
     *
     * This function will retrieve Bpjs of a Employee.
     * See: Employee employee_bpjs() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all DefectCard's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }
}
