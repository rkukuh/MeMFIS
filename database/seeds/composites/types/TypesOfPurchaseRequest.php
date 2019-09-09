<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfPurchaseRequest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'production',
            'name' => 'Production',
            'of'   => 'purchase-request',
        ]);

        Type::create([
            'code' => 'office',
            'name' => 'Office',
            'of'   => 'purchase-request',
        ]);

        Type::create([
            'code' => 'project',
            'name' => 'Project',
            'of'   => 'purchase-request',
        ]);
    }
}
