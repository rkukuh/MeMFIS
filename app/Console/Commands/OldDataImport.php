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

        $this->line('Importing: Customers');
        app()->make(OldDataController::class)->customers();

        $this->line('Importing: Engines');
        app()->make(OldDataController::class)->engines();

        $this->line('Importing: Work Areas');
        app()->make(OldDataController::class)->workAreas();

        $this->line('Importing: Materials and Tools');
        app()->make(OldDataController::class)->materialsAndTools();

        $this->line('Importing: Task Cards for Boeing');
        app()->make(OldDataController::class)->taskCardsBoeing();

        $this->line('Importing: Task Cards CPCP for Trigana');
        app()->make(OldDataController::class)->taskCardsCPCPTrigana();

        $this->line('Importing: Task Cards for CN');
        app()->make(OldDataController::class)->taskCardsCN();

        $this->line('Importing: Materials and Tools for CN');
        app()->make(OldDataController::class)->materialsAndToolsCN();

        $this->line('Syncing: Task Card\'s Items for CN');
        app()->make(OldDataController::class)->taskCardCNItems();

        $this->line('Importing: Employees, and create their user account');
        app()->make(OldDataController::class)->users();
    }
}
