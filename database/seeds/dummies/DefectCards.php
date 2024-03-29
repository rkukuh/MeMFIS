<?php

use App\Models\DefectCard;
use Illuminate\Database\Seeder;

class DefectCards extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DefectCard::class, config('memfis.dummies.defectcards'))->create();
    }
}
