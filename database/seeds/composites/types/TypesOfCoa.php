<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfCoa extends Seeder
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
				'code' => 'activa',
				'name' => 'ACTIVA',
				'of'   => 'coa',
			],
			[
				'code' => 'pasiva',
				'name' => 'PASIVA',
				'of'   => 'coa',
			],
			[
				'code' => 'ekuitas',
				'name' => 'EKUITAS',
				'of'   => 'coa',
			],
			[
				'code' => 'pendapatan',
				'name' => 'PENDAPATAN',
				'of'   => 'coa',
			],
			[
				'code' => 'biaya',
				'name' => 'BIAYA',
				'of'   => 'coa',
			],
		];

		Type::insert($data);
    }
}
