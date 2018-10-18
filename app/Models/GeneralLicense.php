<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\EmployeeLicense;

class GeneralLicense extends MemfisModel
{
    protected $fillable = [
        'aviation_degree',
        'aviation_degree_no',
        'exam_no',
        'exam_date',
        'attendance_no',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A general license may have zero or many aviation (school) degree.
     *
     * This function will retrieve the header of a general license.
     * See: Employee License's general_license_details() method for the inverse
     *
     * @return mixed
     */
    public function employee_license()
    {
        return $this->belongsTo(EmployeeLicense::class);
    }
}
