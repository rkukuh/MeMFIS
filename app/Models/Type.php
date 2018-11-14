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
     * Scope a query to only include type of Address.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAddress(Builder $query)
    {
        return $query->where('of', 'address');
    }

    /**
     * Scope a query to only include type of AP/ERI.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAPERI(Builder $query)
    {
        return $query->where('of', 'aperi');
    }

    /**
     * Scope a query to only include type of ARC.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfARC(Builder $query)
    {
        return $query->where('of', 'arc');
    }

    /**
     * Scope a query to only include type of Aviation School Degree.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAviationDegree(Builder $query)
    {
        return $query->where('of', 'aviation-degree');
    }

    /**
     * Scope a query to only include type of Capability.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCapability(Builder $query)
    {
        return $query->where('of', 'capability');
    }

    /**
     * Scope a query to only include type of Document.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDocument(Builder $query)
    {
        return $query->where('of', 'document');
    }

    /**
     * Scope a query to only include type of Eligibility.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEligibility(Builder $query)
    {
        return $query->where('of', 'eligibility');
    }

    /**
     * Scope a query to only include type of Email.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEmail(Builder $query)
    {
        return $query->where('of', 'email');
    }

    /**
     * Scope a query to only include type of Fax.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfFax(Builder $query)
    {
        return $query->where('of', 'fax');
    }

    /**
     * Scope a query to only include type of Journal.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfJournal(Builder $query)
    {
        return $query->where('of', 'journal');
    }

    /**
     * Scope a query to only include type of Aircraft Maintenance Cycle.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfMaintenanceCycle(Builder $query)
    {
        return $query->where('of', 'maintenance-cycle');
    }

    /**
     * Scope a query to only include type of PaymentTerm.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPaymentTerm(Builder $query)
    {
        return $query->where('of', 'payment-term');
    }

    /**
     * Scope a query to only include type of Phone.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPhone(Builder $query)
    {
        return $query->where('of', 'phone');
    }

    /**
     * Scope a query to only include type of Regulator.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRegulator(Builder $query)
    {
        return $query->where('of', 'regulator');
    }

    /**
     * Scope a query to only include type of Task Card.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCard(Builder $query)
    {
        return $query->where('of', 'taskcard');
    }

    /**
     * Scope a query to only include type of Unit.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfUnit(Builder $query)
    {
        return $query->where('of', 'unit');
    }

    /**
     * Scope a query to only include type of Aircraft Work Area.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfWorkArea(Builder $query)
    {
        return $query->where('of', 'work-area');
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

    /**
     * One-to-Many: A document may have zero or many type.
     *
     * This function will retrieve all documents of a type.
     * See: Document's type() method for the inverse
     *
     * @return mixed
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
