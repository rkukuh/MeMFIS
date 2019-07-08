<?php

namespace App\Models\Pivots;

use App\Models\TaskCard;
use App\Models\Quotation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QuotationTaskCard extends Pivot
{
    use SoftDeletes;

    protected $table = 'taskcard_workpackage';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A Quotation's TaskCards must have a quotation owning to.
     *
     * @return mixed
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * One-Way: A Quotation's TaskCards must have a taskcard assigned to.
     *
     * @return mixed
     */
    public function taskcard()
    {
        return $this->belongsTo(TaskCard::class);
    }
}
