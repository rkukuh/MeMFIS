<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Tags\HasTags;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class EmployeeTermination extends Model implements HasMedia
{
    use HasTags;
    use HasMediaTrait;

    protected $table = 'employee_termination';

    protected $fillable = [
        'termination_id',
        'termination_date',
        'reason',
        'remark'
    ];

    // ----------------------------------------OVERIDE-----------------------------------------------//
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
             ->width(45)
             ->height(45);
    }

    /**
     * One-to-One: An employee may have zero or one termination.
     *
     * This function will retrieve the employees of a termination.
     * See: Employee employee_termination() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
