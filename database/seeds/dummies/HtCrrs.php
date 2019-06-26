<?php

use App\Models\HtCrr;
use Illuminate\Database\Seeder;

class HtCrrs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= config('memfis.dummies.htcrrs'); $i++) {
            $htcrr_parent = factory(HtCrr::class)->create();

            factory(HtCrr::class)->states('removal')->create([
                'code' => $htcrr_parent->code . '-Rem',
                'parent_id' => $htcrr_parent,
                'position' => null,
            ]);
    
            factory(HtCrr::class)->states('installation')->create([
                'code' => $htcrr_parent->code . '-Ins',
                'parent_id' => $htcrr_parent,
                'position' => null,
            ]);
        }
    }
}
