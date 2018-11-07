<?php

use Spatie\Tags\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::findOrCreate('Component', 'item');
        Tag::findOrCreate('Material', 'item');
        Tag::findOrCreate('Tool', 'item');
        Tag::findOrCreate('Engine / Powerplant', 'item');
        Tag::findOrCreate('Raw Material', 'item');
        Tag::findOrCreate('Tire', 'item');
        Tag::findOrCreate('Consumable', 'item');
        Tag::findOrCreate('Oil', 'item');
    }
}
