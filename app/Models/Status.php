<?php

namespace App\Models;

use App\MemfisModel;
use Illuminate\Database\Eloquent\Builder;

class Status extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
        'description',
    ];

    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include status of attendance.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAttendance(Builder $query)
    {
        return $query->where('of', 'attendance');
    }

    /**
     * Scope a query to only include status of attendance correction.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAttendanceCorrection(Builder $query)
    {
        return $query->where('of', 'attendance-correction');
    }

    /**
     * Scope a query to only include status of customer's component repair.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCustomerComponentRepair(Builder $query)
    {
        return $query->where('of', 'customer-component-repair');
    }

    /**
     * Scope a query to only include status of defect card.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDefectCard(Builder $query)
    {
        return $query->where('of', 'defectcard');
    }

    /**
     * Scope a query to only include status of employment.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEmployment(Builder $query)
    {
        return $query->where('of', 'employment');
    }

    /**
     * Scope a query to only include status of HTCRR.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfHtCrr(Builder $query)
    {
        return $query->where('of', 'htcrr');
    }

    /**
     * Scope a query to only include status of job card.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfJobCard(Builder $query)
    {
        return $query->where('of', 'jobcard');
    }

    /**
     * Scope a query to only include status of leave.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfLeave(Builder $query)
    {
        return $query->where('of', 'leave');
    }

    /**
     * Scope a query to only include status of marital.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfMarital(Builder $query)
    {
        return $query->where('of', 'marital');
    }

    /**
     * Scope a query to only include status of overtime.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfOvertime(Builder $query)
    {
        return $query->where('of', 'overtime');
    }

    /**
     * Scope a query to only include status of project.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfProject(Builder $query)
    {
        return $query->where('of', 'project');
    }

    /**
     * Scope a query to only include status of quotation.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfQuotation(Builder $query)
    {
        return $query->where('of', 'quotation');
    }

    /**
     * Scope a query to only include status of RIR.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRIR(Builder $query)
    {
        return $query->where('of', 'rir');
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many statuses.
     *
     * This function will get all of the owning statusable models.
     * See:
     * - JobCard's statuses() method for the inverse
     *
     * @return mixed
     */
    public function statusable()
    {
        return $this->morphTo();
    }
}
