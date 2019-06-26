<?php

namespace App\Http\Controllers\Import;

use App\Imports\UsersImport;
use App\Imports\EnginesImport;
use App\Imports\WorkAreasImport;
use App\Imports\PersonnelsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\TaskCardsBoeingImport;
use App\Imports\MaterialsAndToolsImport;

class OldDataController extends Controller
{
    protected $import_directory = 'import/';

    public function engines()
    {
        Excel::import(new EnginesImport, $this->import_directory . 'engines.xlsx');
    }

    public function workAreas()
    {
        Excel::import(new WorkAreasImport, $this->import_directory . 'work-areas.xlsx');
    }

    public function materialsAndTools()
    {
        // Excel::import(new MaterialsAndToolsImport, $this->import_directory . 'materials-tools.xlsx');
    }
    
    public function taskCardsBoeingImport()
    {
        // Excel::import(new TaskCardsBoeingImport, $this->import_directory . 'taskcards-boeing-737.xlsx');
    }

    public function userImport()
    {
        Excel::import(new UsersImport, $this->import_directory . 'users.xlsx');
    }
}
