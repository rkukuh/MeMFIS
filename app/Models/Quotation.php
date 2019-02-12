<?php

namespace App\Models;

use App\MemfisModel;

class Quotation extends MemfisModel
{
    protected $fillable = [
        'number',
        'requested_at',
        'valid_until',
        'currency_id',
        'exchange_rate',
        // 'scheduled_payment_type',
        // 'scheduled_payment_amount',
        'total',
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
     * One-to-Many: A quotation may have one scheduled payment.
     *
     * This function will retrieve the scheduled payment (type) of a quotation.
     * See: ScheduledPayment's quotation() method for the inverse
     *
     * @return mixed
     */
    public function scheduled_payments()
    {
        return $this->hasMany(ScheduledPayment::class);
    }
}
