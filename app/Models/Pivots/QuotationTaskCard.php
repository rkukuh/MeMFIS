<?php

namespace App\Models\Pivots;

use App\Models\TaskCard;
use App\Models\Quotation;
use App\Models\QuotationTaskCardItem;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QuotationTaskCard extends Pivot
{
    use SoftDeletes;

    protected $table = 'taskcard_workpackage';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A Quotation's TaskCard may have one or many item.
     *
     * This function will retrieve all the item of a Quotation's TaskCard.
     * See: QuotationTaskCardItem's header() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->hasMany(QuotationTaskCardItem::class, 'taskcard_workpackage_id');
    }

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
