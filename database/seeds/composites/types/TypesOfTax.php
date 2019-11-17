<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTax extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Type of taxes

        Type::create([
            'code' => 'ppn',
            'name' => 'PPN',
            'of'  => 'tax',
        ]);

        Type::create([
            'code' => 'pph',
            'name' => 'PPH',
            'of'  => 'tax',
        ]);

        Type::create([
            'code' => 'import-tax',
            'name' => 'Import Tax',
            'of'  => 'tax',
        ]);

        Type::create([
            'code' => 'export-tax',
            'name' => 'Export Tax',
            'of'  => 'tax',
        ]);

        //Payment Type Method of taxes

        Type::create([
            'code' => 'include',
            'name' => 'Include',
            'of'  => 'tax-payment-method',
        ]);

        Type::create([
            'code' => 'exclude',
            'name' => 'Exclude',
            'of'  => 'tax-payment-method',
        ]);

        Type::create([
            'code' => 'none',
            'name' => 'No Taxation',
            'of'  => 'tax-payment-method',
        ]);

    }
}
