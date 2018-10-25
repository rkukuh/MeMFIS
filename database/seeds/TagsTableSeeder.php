<?php

use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'Components']);
        Tag::create(['name' => 'Materials']);
        Tag::create(['name' => 'Tools']);
    }
}
