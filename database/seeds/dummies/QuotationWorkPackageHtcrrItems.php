<?php

use Illuminate\Database\Seeder;
use App\Models\QuotationWorkPackageHtcrrItem;

class QuotationWorkPackageHtcrrItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(QuotationWorkPackageHtcrrItem::class, config('memfis.dummies.quotation.workpackage.htcrr.items'))->create();
    }
}
