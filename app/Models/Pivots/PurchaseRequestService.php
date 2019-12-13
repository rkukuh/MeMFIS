<?php

namespace App\Models\Pivots;;

use App\Models\Unit;
use App\Models\Service;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PurchaseRequestService extends Pivot
{
    use SoftDeletes;

    protected $table = 'purchase_request_service';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: An service is an service.
     *
     * @return mixed
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * One-Way: A Purchse Rquest's Item must have a unit assigned to.
     *
     * @return mixed
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
