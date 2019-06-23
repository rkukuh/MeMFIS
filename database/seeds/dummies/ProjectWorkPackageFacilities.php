<?php

use App\Models\Price;
use App\Models\Facility;
use Illuminate\Database\Seeder;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageFacility;

class ProjectWorkPackageFacilities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= ProjectWorkPackage::count(); $i++) {
            $project_workpackage = ProjectWorkPackage::find($i);

            for ($j = 1; $j <= rand(2, Facility::count()); $j++) {
                $rental_prices = Price::where('priceable_type', 'App\Models\Facility')->get();

                $project_workpackage->facilities()->create([
                    'facility_id' => Facility::find($j)->id,
                    'price_id' => $rental_prices->random()->id,
                    'note' => $faker->randomElement([null, $faker->text]),
                ]);
            }
        }
    }
}
