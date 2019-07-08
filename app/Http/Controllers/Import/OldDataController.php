<?php

namespace App\Http\Controllers\Import;

use App\Imports\UsersImport;
use App\Imports\EnginesImport;
use App\Imports\WorkAreasImport;
use App\Imports\PersonnelsImport;
use App\Imports\TaskCardsCNimport;
use App\Imports\TaskCardsCNItemimport;
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
        Excel::import(new MaterialsAndToolsImport, $this->import_directory . 'master-materials-tools-cn.xlsx');
        // Excel::import(new MaterialsAndToolsImport, $this->import_directory . 'materials-tools.xlsx');
    }

    public function taskCardsBoeingImport()
    {
        // Excel::import(new TaskCardsBoeingImport, $this->import_directory . 'tc-cn.xlsx');
    }

    public function taskCardsCNImport()
    {
        Excel::import(new TaskCardsCNimport, $this->import_directory . 'tc-cn-235.xlsx');
    }

    public function taskCardsCNItemImport()
    {
        // Excel::import(new TaskCardsCNItemimport, $this->import_directory . 'cn-item-tc.xlsx');
        Excel::import(new TaskCardsCNItemimport, $this->import_directory . 'cn-tool-tc.xlsx');
    }

    public function userImport()
    {
        Excel::import(new UsersImport, $this->import_directory . 'users.xlsx');
    }
}
