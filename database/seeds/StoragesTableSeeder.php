<?php

use App\Models\Storage;
use Illuminate\Database\Seeder;

class StoragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::create([
            'code' => 'part',
            'name' => 'Part',
            'description' => 'Central storage',
        ]);

        Storage::create([
            'code' => 'chemical',
            'name' => 'Chemical',
            'description' => 'Chemical storage for storing chemical materials',
        ]);

        Storage::create([
            'code' => 'gse',
            'name' => 'GSE & Tool',
            'description' => 'Storage for storing GSE',
        ]);

        Storage::create([
            'code' => 'scrap',
            'name' => 'Scrap',
            'description' => 'Scrap storage for storing scrap materials or tools',
        ]);
    }
}
