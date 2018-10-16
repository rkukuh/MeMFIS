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

    /**
     * One-to-Many: A license may have zero or many general license.
     *
     * This function will retrieve the license of a general license.
     * See: General License's license() method for the inverse
     *
     * @return mixed
     */
    public function license()
    {
        return $this->belongsTo(License::class)
                    ->as('general_license')
                    ->withPivot(
                        'aviation_degree',
                        'aviation_degree_code',
                        'exam_no',
                        'exam_date',
                        'attendance_no'
                    )
                    ->withTimestamps();
    }
}
