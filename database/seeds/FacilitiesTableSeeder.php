<?php

use App\Models\Price;
use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facility = Facility::create([
            'code' => 'line1',
            'name' => 'Hanggar line 1',
        ]);

        for($i=1;$i<=5;$i++){
            $facility->prices()
            ->save(new Price (['amount' =>0,'level' =>$i]));
        }

        $facility = Facility::create([
            'code' => 'line2',
            'name' => 'Hanggar line 2',
        ]);

        for($i=1;$i<=5;$i++){
            $facility->prices()
            ->save(new Price (['amount' =>0,'level' =>$i]));
        }

        $facility = Facility::create([
            'code' => 'line3',
            'name' => 'Hanggar line 3',
        ]);

        for($i=1;$i<=5;$i++){
            $facility->prices()
            ->save(new Price (['amount' =>0,'level' =>$i]));
        }

        $facility = Facility::create([
            'code' => 'line4',
            'name' => 'Hanggar line 4',
        ]);

        for($i=1;$i<=5;$i++){
            $facility->prices()
            ->save(new Price (['amount' =>0,'level' =>$i]));
        }

        $facility = Facility::create([
            'code' => 'line5',
            'name' => 'Hanggar line 5',
        ]);

        for($i=1;$i<=5;$i++){
            $facility->prices()
            ->save(new Price (['amount' =>0,'level' =>$i]));
        }


    }
}
