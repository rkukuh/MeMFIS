<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Import\OldDataController;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'memfis:import-data {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from parameter';

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

        switch ($this->option('name')) {
            case 'customer':
                $this->line('Importing: Customers');
                app()->make(OldDataController::class)->customers();
                break;
            case 'employee':
                $this->line('Importing: Employees, and create their user account');
                app()->make(OldDataController::class)->users();
                break;
            case 'enginer':
                $this->line('Importing: Engines');
                app()->make(OldDataController::class)->engines();
                break;
            case 'workarea':
                $this->line('Importing: Work Areas');
                app()->make(OldDataController::class)->workAreas();
                break;
            case 'item':
                $this->line('Importing: Materials and Tools');
                app()->make(OldDataController::class)->materialsAndTools();
                break;
            case 'taskcard-boeing':
                $this->line('Importing: Task Cards for Boeing');
                app()->make(OldDataController::class)->taskCardsBoeing();
                break;
            case 'taskcard-trigana':
                $this->line('Importing: Task Cards CPCP for Trigana');
                app()->make(OldDataController::class)->taskCardsCPCPTrigana();
                break;
            case 'taskcard-cn':
                $this->line('Importing: Task Cards for CN');
                app()->make(OldDataController::class)->taskCardsCN();
                break;
            case 'item-cn':
                $this->line('Importing: Materials and Tools for CN');
                app()->make(OldDataController::class)->materialsAndToolsCN();
                break;
            case 'master-manufacturer':
                $this->line('Importing: Master data manufacturer');
                app()->make(OldDataController::class)->aircrafts();
                break;
            case 'master-aircraft':
                $this->line('Importing: Master data Aircraft');
                app()->make(OldDataController::class)->manufacturers();
                break;
            case 'atr-72':
                $this->line('Importing: Task Cards data ATR-72');
                app()->make(OldDataController::class)->taskCardsATR();
                break;
           case 'fefoin':
                $this->line('Importing: First In First Out In');
                app()->make(OldDataController::class)->fefoin();
                break;
            case 'sim-dec':
                $this->line('Importing: data for simulation on december 2019');
                app()->make(OldDataController::class)->decemberSimulation();
                break;
            default:
                $this->line('Importing: File not Found');
                break;
        }
    }
}
