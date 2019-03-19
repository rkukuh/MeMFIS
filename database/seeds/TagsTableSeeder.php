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
        Tag::findOrCreate('Engine', 'item');
        Tag::findOrCreate('Oil', 'item');
        Tag::findOrCreate('Fluid', 'item');
        Tag::findOrCreate('Grease', 'item');
        Tag::findOrCreate('Tire', 'item');
        Tag::findOrCreate('Rubber', 'item');
        Tag::findOrCreate('Glass', 'item');
        Tag::findOrCreate('Plastic', 'item');
        Tag::findOrCreate('Soil', 'item');
        Tag::findOrCreate('Brick', 'item');

    }
}
