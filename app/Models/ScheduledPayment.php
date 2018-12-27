<?php

namespace App\Models;

use App\MemfisModel;

class ScheduledPayment extends MemfisModel
{
    protected $table = 'scheduledpayments';

    protected $fillable = [
        'quotation_id',
        'type_id',
        'value',
    ];
}
