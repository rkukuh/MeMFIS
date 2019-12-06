<?php

use App\Models\Benefit;
use App\Models\Position;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class BenefitPositionExample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** positions */
        $staff = Position::where('code', 'STF001')->first();
        $spv = Position::where('code', 'SPV01')->first();
        $manager = Position::where('code', 'MGR01')->first();
        $gm = Position::where('code', 'GM01')->first();
        $ceo = Position::where('code', 'CEO')->first();
        
        /** benefits */
        $gaji_pokok = Benefit::where('code', 'GP001')->first();
        $thr = Benefit::where('code', 'THR001')->first();
        $um = Benefit::where('code', 'UM001')->first();
        $ovt = Benefit::where('code', 'OVT001')->first();

        $staff->benefits()->attach([
            $gaji_pokok->id => ['min' => 100000,'max' => 15000000],
            $um->id => ['min' => 5000,'max' => 500000],
            $ovt->id => ['min' => 5000,'max' => 200000]
        ]);

        $spv->benefits()->attach([
            $gaji_pokok->id => ['min' => 100000,'max' => 15000000],
            $um->id => ['min' => 5000,'max' => 500000],
            $ovt->id => ['min' => 5000,'max' => 200000],
            $thr->id => ['min' => 100000,'max' => 10000000]
        ]);

        $manager->benefits()->attach([
            $gaji_pokok->id => ['min' => 100000,'max' => 15000000],
            $um->id => ['min' => 5000,'max' => 500000],
            $thr->id => ['min' => 100000,'max' => 10000000]
        ]);

        $gm->benefits()->attach([
            $gaji_pokok->id => ['min' => 100000,'max' => 15000000],
            $thr->id => ['min' => 100000,'max' => 10000000]
        ]);

        $ceo->benefits()->attach([
            $gaji_pokok->id => ['min' => 100000,'max' => 15000000],
            $thr->id => ['min' => 100000,'max' => 10000000]
        ]);
    }
}
