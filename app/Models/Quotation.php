<?php

namespace App\Models;

use App\MemfisModel;

class Quotation extends MemfisModel
{
    protected $fillable = [
        'number',
        'project_id',
        'customer_id',
        'requested_at',
        'valid_until',
        'currency_id',
        'term_and_condition',
        'term_of_payment',
        'exchange_rate',
        'subtotal',
        'grandtotal',
        'scheduled_payment_type',
        'scheduled_payment_amount',
        'term_of_payment',
        'term_of_condition',
        'description',
    ];

    protected $dates = ['requested_at', 'valid_until'];

    /*************************************** RELATIONSHIP ****************************************/

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
                        'pricelist_unit',
                        'pricelist_price',
                        'subtotal',
                        'note'
                    )
                    ->withTimestamps();
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
                        'description'
                    )
                    ->withTimestamps();
    }
}
