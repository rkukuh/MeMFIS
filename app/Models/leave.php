<?php

namespace App\Models;

use App\MemfisModel;

class leave extends MemfisModel
{
    
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-One: An employee attendance have zero or one leave.
     *
     * This function will retrieve leave of a given attendance.
     * See: Employee Attendance's attendance_leave() method for the inverse
     *
     * @return mixed
     */
    public function attendance()
    {
        return $this->belongsTo(EmployeeAttendance::class);
    }
}
