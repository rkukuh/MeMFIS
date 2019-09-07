<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Tags\HasTags;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class EmployeeSchool extends Model implements HasMedia
{
    use HasTags;
    use HasMediaTrait;

    protected $table = 'employee_school';

    protected $fillable = [
        'degree',
        'institute',
        'field_of_study',
        'graduated_at',
    ];

    // ----------------------------------------OVERIDE-----------------------------------------------//
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
             ->width(45)
             ->height(45);
    }

    /**
     * Many-to-One: An employee may have zero or many schools.
     *
     * This function will retrieve all the employees of a school.
     * See: Employee employee_school() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}
