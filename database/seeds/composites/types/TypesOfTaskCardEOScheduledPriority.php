<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTaskCardEOScheduledPriority extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'next-shop-visit',
            'name' => 'Next check / shop visit',
            'of'  => 'taskcard-eo-scheduled-priority',
        ]);

        Type::create([
            'code' => 'next-hm-visit',
            'name' => 'Next heavy maintenance visit',
            'of'  => 'taskcard-eo-scheduled-priority',
        ]);

        Type::create([
            'code' => 'by-ppc',
            'name' => 'As scheduled by PPC',
            'of'  => 'taskcard-eo-scheduled-priority',
        ]);

        Type::create([
            'code' => 'prior-to',
            'name' => 'Prior to',
            'of'  => 'taskcard-eo-scheduled-priority',
        ]);
    }
}
