<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfQuotation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'code' => 'open',
            'name' => 'Open',
            'of'   => 'quotation',
        ]);

        Status::create([
            'code' => 'cancel',
            'name' => 'Cancel',
            'of'   => 'quotation',
        ]);

        Status::create([
            'code' => 'close',
            'name' => 'Close',
            'of'   => 'quotation',
        ]);
    }
}
