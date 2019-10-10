<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesOfTaskCardEO extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'code' => 'modif-major',
            'name' => 'Major Modification',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'modif-minor',
            'name' => 'Minor Modification',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'repair',
            'name' => 'Repair / Deviation',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'inspection',
            'name' => 'Inspection',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'program-change',
            'name' => 'Maintenance Program Change',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'fleet',
            'name' => 'Fleet Standard',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'replacement',
            'name' => 'Replacement',
            'of' => 'taskcard-eo',
        ]);
        
        Category::create([
            'code' => 'installation',
            'name' => 'Installation',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'modification',
            'name' => 'Modification',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'check',
            'name' => 'Check',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'lubrication',
            'name' => 'Lubrication',
            'of' => 'taskcard-eo',
        ]);

        Category::create([
            'code' => 'test',
            'name' => 'Test',
            'of' => 'taskcard-eo',
        ]);
    }
}
