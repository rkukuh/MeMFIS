<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfQuotationItemCost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'evaluation-cost',
            'name' => 'Evaluation Cost',
            'of'  => 'quotation-item-cost',
        ]);

        Type::create([
            'code' => 'full-package-cost',
            'name' => 'Full Package Cost',
            'of'  => 'quotation-item-cost',
        ]);
    }
}
