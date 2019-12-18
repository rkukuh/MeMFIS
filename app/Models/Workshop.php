<?php

namespace App\Models;

use App\MemfisModel;

class Workshop extends MemfisModel
{
    protected $table = 'item_quotation';

    protected $fillable = [
        'quotation_id',
        'item_id',
        'serial_number',
        'complaint',
        'jobrequest_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: An item is an item.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * One-Way: An item is an quotation.
     *
     * @return mixed
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

}
