<?php

use App\Models\License;
use Illuminate\Database\Seeder;

class LicensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        License::create([
            'code' => 'general-license',
            'name' => 'General License',
            'regulator' => Type::ofRegulator()->where('code', 'dgca')->first()->id,
        ]);

        License::create([
            'code' => 'amel-dgca',
            'name' => 'AME License (by DGCA)',
            'regulator' => Type::ofRegulator()->where('code', 'dgca')->first()->id,
        ]);

        License::create([
            'code' => 'amel-easa',
            'name' => 'AME License (by EASA)',
            'regulator' => Type::ofRegulator()->where('code', 'easa')->first()->id,
        ]);

        License::create([
            'code' => 'amel-faa',
            'name' => 'AME License (by FAA)',
            'regulator' => Type::ofRegulator()->where('code', 'faa')->first()->id,
        ]);
    }
}
