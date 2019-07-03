<?php

namespace App\Models;

use App\MemfisModel;

class Quotation extends MemfisModel
{
    protected $fillable = [
        'number',
        'project_id',
        'customer_id',
        'attention',
        'requested_at',
        'valid_until',
        'currency_id',
        'term_and_condition',
        'term_of_payment',
        'exchange_rate',
        'subtotal',
        'charge',
        'ppn',
        'grandtotal',
        'title',
        'scheduled_payment_type',
        'scheduled_payment_amount',
        'term_of_payment',
        'term_of_condition',
        'description',
    ];

    protected $dates = ['requested_at', 'valid_until'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all Quotation's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * One-to-Many: A quotation may have one currency.
     *
     * This function will retrieve the currency of a quotation.
     * See: Currency's quotations() method for the inverse
     *
     * @return mixed
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * One-to-Many: A quotation may have one customer.
     *
     * This function will retrieve the customer of a quotation.
     * See: Customer's quotations() method for the inverse
     *
     * @return mixed
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Many-to-Many: A quotation may have zero or many item.
     *
     * This function will retrieve all the items of a quotation.
     * See: Item's quotations() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot(
                        'taskcard_id',
                        'pricelist_unit_id',
                        'pricelist_price',
                        'subtotal',
                        'note'
                    )
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A jobcard must related to a quotation
     *
     * This function will retrieve all the jobcards of a quotation.
     * See: JobCard's quotation() method for the inverse
     *
     * @return mixed
     */
    public function jobcards()
    {
        return $this->hasMany(JobCard::class);
    }

    /**
     * One-to-Many: A quotation may have one project.
     *
     * This function will retrieve the project of a quotation.
     * See: Project's quotations() method for the inverse
     *
     * @return mixed
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Polymorphic: An entity can have zero or many progresses.
     *
     * This function will get all Quotation's progresses.
     * See: Progress's progressable() method for the inverse
     *
     * @return mixed
     */
    public function progresses()
    {
        return $this->morphMany(Progress::class, 'progressable');
    }

    /**
     * Many-to-Many: A quotation may have one or many workpackage.
     *
     * This function will retrieve all the workpackages of a quotation.
     * See: WorkPackage's quotations() method for the inverse
     *
     * @return mixed
     */
    public function workpackages()
    {
        return $this->belongsToMany(WorkPackage::class, 'quotation_workpackage', 'quotation_id', 'workpackage_id')
                    ->withPivot(
                        'manhour_total',
                        'manhour_rate',
                        'discount_type',
                        'discount_value',
                        'description'
                    )
                    ->withTimestamps();
    }
}
