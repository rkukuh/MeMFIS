<?php

namespace App\Http\Controllers\Import;

use App\Imports\EnginesImport;
use App\Imports\WorkAreasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

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
}
