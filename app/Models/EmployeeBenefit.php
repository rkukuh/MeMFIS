<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeBenefit extends Model
{
    protected $table = 'employee_benefit';
    public $timestamps = false;
    protected $fillable = [
        'employee_id',
        'benefit_id',
        'amount',
        'created_at',
        'updated_at',
        'approved_at'
    ];

    /**
     * One-to-Many: An EmployeeBenefit have many Employee.
     *
     * This function will retrieve Benefit of a Employee.
     * See: Employee employee_benefit() method for the inverse
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
     * This function will get all EmployeeBenefit's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }


}
