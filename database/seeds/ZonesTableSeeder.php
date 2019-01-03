<?php

use App\Models\Zone;
use App\Models\Aircraft;
use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** AIRCRAFT */

        $count_aircrafts = Aircraft::count();

        for ($i = 1; $i <= $count_aircrafts; $i++) {
            $aircraft = Aircraft::find($i);

            for ($j = 1; $j <= rand(2, 5) ; $j++) {
                $aircraft->zones()->save(
                    factory(Zone::class)->make()
                );
            }
        }
    }
}
