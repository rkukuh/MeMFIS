<?php

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certification::create([
            'code' => 'otr',
            'name' => 'Certificate of Authorization',
        ]);
    }
}
