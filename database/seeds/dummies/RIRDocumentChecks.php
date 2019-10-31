<?php

use Illuminate\Database\Seeder;
use App\Models\RIRDocumentCheck;

class RIRDocumentChecks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RIRDocumentCheck::class, config('memfis.dummies.rir.document-checks'))->create();
    }
}
