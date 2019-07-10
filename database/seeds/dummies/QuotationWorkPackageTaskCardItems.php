<?php

use Illuminate\Database\Seeder;
use App\Models\QuotationWorkPackageTaskCardItem;

class QuotationWorkPackageTaskCardItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(QuotationWorkPackageTaskCardItem::class, config('memfis.dummies.quotation.workpackage.taskcard.items'))->create();
    }
}
