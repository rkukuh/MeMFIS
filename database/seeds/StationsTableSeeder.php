<?php

use App\Models\Station;
use App\Models\Aircraft;
use Illuminate\Database\Seeder;

class StationsTableSeeder extends Seeder
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
                $aircraft->stations()->save(
                    factory(Station::class)->make()
                );
            }
        }
    }
}
