<?php

use Illuminate\Database\Seeder;
use App\Models\QuotationHtcrrItem;

class QuotationHtcrrItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(QuotationHtcrrItem::class, config('memfis.dummies.quotation.htcrr.items'))->create();
    }
}
