<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfCoaTransaction extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = [
			[
				'code' => 'inventory',
				'name' => 'Inventory',
				'of'   => 'coa-transaction',
			],
			[
				'code' => 'cogs',
				'name' => 'COGS',
				'of'   => 'coa-transaction',
			],
		];

		Type::insert($data);
    }
}
