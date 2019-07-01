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
        ini_set('memory_limit', '-1');

        $this->line('Importing: Engine');
        app()->make(OldDataController::class)->engines();

        $this->line('Importing: Work Area');
        app()->make(OldDataController::class)->workAreas();

        $this->line('Importing: Material and Tool');
        app()->make(OldDataController::class)->materialsAndTools();

        $this->line('Importing: Task Card for Boeing');
        app()->make(OldDataController::class)->taskCardsBoeingImport();

        $this->line('Importing: Task Card for CN');
        app()->make(OldDataController::class)->taskCardsCNImport();

        $this->line('Syncing: Task Card item for CN');
        app()->make(OldDataController::class)->taskCardsCNItemImport();

        $this->line('Importing: Employee, and create their user account');
        app()->make(OldDataController::class)->userImport();
    }
}
