<?php

use Illuminate\Database\Seeder;
use App\Models\QuotationDefectCardItem;

class QuotationDefectCardItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(QuotationDefectCardItem::class, config('memfis.dummies.quotation.defectcard.items'))->create();
    }
}
