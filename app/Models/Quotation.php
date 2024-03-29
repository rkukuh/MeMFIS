<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\QuotationWorkPackage;

class Quotation extends MemfisModel
{
    protected $fillable = [
        'number',
        'parent_id',
        'quotationable_type',
        'quotationable_id',
        'attention',
        'requested_at',
        'valid_until',
        'currency_id',
        'term_and_condition',
        'term_of_payment',
        'exchange_rate',
        'subtotal',
        'charge',
        'grandtotal',
        'title',
        'scheduled_payment_type',
        'scheduled_payment_amount',
        'term_of_payment',
        'term_of_condition',
        'description',
        'data_defectcard',
        'data_htcrr',
        'origin_project',
        'origin_currency',
        'origin_scheduled_payment_type',
        'origin_quotation',
        'origin_quotation_workpackages',
        'origin_quotation_workpackage_items',
        'origin_quotation_workpackage_taskcard_items',
        'origin_quotation_htcrr_items',
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
     * One-to-Many (self-join): A Quotation may have none or many sub-quotation.
     *
     * This function will retrieve the sub-quotation of a quotation, if any.
     * See: Quotation's parent() method for the inverse
     *
     * @return mixed
     */
    public function childs()
    {
        return $this->hasMany(Quotation::class, 'parent_id');
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
     * One-to-Many: A Quotation (additional) may have zero or many Defect Cards.
     *
     * This function will retrieve all the Defect Cards of a given quotation (additional).
     * See: DefectCard's quotation_additional() method for the inverse
     *
     * @return mixed
     */
    public function defectcards()
    {
        return $this->hasMany(DefectCard::class, 'quotation_additional_id');
    }

    /**
     * Many-to-Many: A quotation may have zero or many item.
     *
     * This function will retrieve all the items of a quotation.
     * See: Item's quotations() method for the inverse
     *
     * @return mixed
     */
    public function workshop()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot(
                        'serial_number',
                        'complaint',
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
     * One-to-Many (self-join): A Quotation may have none or many sub-quotation.
     *
     * This function will retrieve the parent of a sub-quotation.
     * See: Quotation's childs() method for the inverse
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(Quotation::class, 'parent_id');
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
     * M-M Polymorphic: A promo can be applied to many entities.
     *
     * This function will get all the promos that are applied to a given quotation.
     * See: Promo's quotations() method for the inverse
     *
     * @return mixed
     */
    public function promos()
    {
        return $this->morphToMany(Promo::class, 'promoable')
                    ->withPivot(
                        'value',
                        'amount'
                    )
                    ->withTimestamps();
    }

    /**
     * Polymorphic: An entity can have zero or many quotations.
     *
     * This function will get all of the owning quotationable models.
     * See:
     * - Project's quotations() method for the inverse
     *
     * @return mixed
     */
    public function quotationable()
    {
        return $this->morphTo();
    }

    /**
     * Polymorphic: An entity can have zero or many taxes.
     *
     * This function will get all Quotation's taxes.
     * See: Tax's taxable() method for the inverse
     *
     * @return mixed
     */
    public function taxes()
    {
        return $this->morphMany(Tax::class, 'taxable');
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
                    ->using(QuotationWorkPackage::class)
                    ->withPivot(
                        'manhour_total',
                        'manhour_rate_id',
                        'manhour_rate_amount',
                        'discount_type',
                        'discount_value',
                        'description'
                    )
                    ->withTimestamps();
    }
}
