<?php

namespace App\Http\Controllers\Import;

use App\Imports\UsersImport;
use App\Imports\EnginesImport;
use App\Imports\AircraftsImport;
use App\Imports\CustomersImport;
use App\Imports\WorkAreasImport;
use App\Imports\TaskCardsCNimport;
use App\Imports\TaskCardsATRImport;
use App\Imports\ManufacturersImport;
use App\Imports\TaskCardsCNItemimport;
use App\Imports\TaskCardsBoeingImport;
use App\Imports\MaterialsAndToolsImport;
use App\Imports\MaterialsAndToolsCNImport;
use App\Imports\TaskCardsCPCPTriganaimport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class OldDataController extends Controller
{
    protected $import_directory = 'import/';

    public function aircrafts()
    {
        Excel::import(new AircraftsImport, $this->import_directory . 'master-aircrafts.xlsx');
    }

    public function customers()
    {
        Excel::import(new CustomersImport, $this->import_directory . 'customer.xlsx');
    }

    public function engines()
    {
        Excel::import(new EnginesImport, $this->import_directory . 'engines.xlsx');
    }

    public function manufacturers()
    {
        Excel::import(new ManufacturersImport, $this->import_directory . 'master-manufacturers.xlsx');
    }

    public function materialsAndTools()
    {
        Excel::import(new MaterialsAndToolsImport, $this->import_directory . 'master-items.xlsx');
    }

    public function materialsAndToolsCN()
    {
        Excel::import(new MaterialsAndToolsCNImport, $this->import_directory . 'master-materials-cn.xlsx');
        Excel::import(new MaterialsAndToolsCNImport, $this->import_directory . 'master-tools-cn.xlsx');
    }
    
    public function taskCardsATR()
    {
        Excel::import(new TaskCardsATRImport, $this->import_directory . 'taskcards-atr-72.xlsx');
    }

    public function taskCardCNItems()
    {
        Excel::import(new TaskCardsCNItemimport, $this->import_directory . 'cn-item-tc.xlsx');
        Excel::import(new TaskCardsCNItemimport, $this->import_directory . 'cn-tool-tc.xlsx');
    }

    public function taskCardsBoeing()
    {
        // Excel::import(new TaskCardsBoeingImport, $this->import_directory . 'taskcards-boeing-737.xlsx');
    }

    public function taskCardsCPCPTrigana()
    {
        Excel::import(new TaskCardsCPCPTriganaimport, $this->import_directory . 'tc-cpcp-trigana.xlsx');
    }

    public function taskCardsCN()
    {
        Excel::import(new TaskCardsCNimport, $this->import_directory . 'tc-cn-235.xlsx');
    }

    public function users()
    {
        Excel::import(new UsersImport, $this->import_directory . 'users.xlsx');
    }
    
    public function workAreas()
    {
        Excel::import(new WorkAreasImport, $this->import_directory . 'work-areas.xlsx');
    }
}
