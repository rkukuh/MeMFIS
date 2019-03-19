<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Import\OldDataController;

class OldDataImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'memfis:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all old system data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Importing: Engine');
        app()->make(OldDataController::class)->engines();

        $this->line('Importing: Personnel');
        app()->make(OldDataController::class)->personnels();

        $this->line('Importing: Work Area');
        app()->make(OldDataController::class)->workAreas();

        $this->line('Importing: Materials and Tools');
        app()->make(OldDataController::class)->materialsAndTools();
        
        $this->line('Importing: Mpret kon hus');
        app()->make(OldDataController::class)->taskCardsBoeingImport();
    }
}
