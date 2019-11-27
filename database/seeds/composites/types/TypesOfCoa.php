<?php

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
				'uuid' => Str::uuid()->toString(),
				'code' => 'activa',
				'name' => 'ACTIVA',
				'of'   => 'coa',
			],
			[
				'uuid' => Str::uuid()->toString(),
				'code' => 'activa',
				'code' => 'pasiva',
				'name' => 'PASIVA',
				'of'   => 'coa',
			],
			[
				'uuid' => Str::uuid()->toString(),
				'code' => 'activa',
				'code' => 'ekuitas',
				'name' => 'EKUITAS',
				'of'   => 'coa',
			],
			[
				'uuid' => Str::uuid()->toString(),
				'code' => 'activa',
				'code' => 'pendapatan',
				'name' => 'PENDAPATAN',
				'of'   => 'coa',
			],
			[
				'uuid' => Str::uuid()->toString(),
				'code' => 'activa',
				'code' => 'biaya',
				'name' => 'BIAYA',
				'of'   => 'coa',
			],
		];

		Type::insert($data);
    }
}
