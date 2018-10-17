<?php

namespace App\Models;

use App\MemfisModel;
use Illuminate\Database\Eloquent\Builder;

class Type extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
        'description',
    ];

    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include category of ARC.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfARC(Builder $query)
    {
        return $query->where('of', 'arc');
    }

    /**
     * Scope a query to only include category of Aviation School Degree.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAviationSchoolDegree(Builder $query)
    {
        return $query->where('of', 'aviation-school-degree');
    }

    /**
     * Scope a query to only include category of capability.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCapability(Builder $query)
    {
        return $query->where('of', 'capability');
    }

    /**
     * Scope a query to only include category of eligibility.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEligibility(Builder $query)
    {
        return $query->where('of', 'eligibility');
    }

    /**
     * Scope a query to only include category of email.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEmail(Builder $query)
    {
        return $query->where('of', 'email');
    }

    /**
     * Scope a query to only include category of fax.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfFax(Builder $query)
    {
        return $query->where('of', 'fax');
    }

    /**
     * Scope a query to only include category of journal.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfJournal(Builder $query)
    {
        return $query->where('of', 'journal');
    }

    /**
     * Scope a query to only include category of phone.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPhone(Builder $query)
    {
        return $query->where('of', 'phone');
    }

    /**
     * Scope a query to only include category of regulator.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRegulator(Builder $query)
    {
        return $query->where('of', 'regulator');
    }

    /**
     * Scope a query to only include category of unit.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfUnit(Builder $query)
    {
        return $query->where('of', 'unit');
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A journal may have zero or many type.
     *
     * This function will retrieve all journals of a type.
     * See: Journal's type() method for the inverse
     *
     * @return mixed
     */
    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
}
