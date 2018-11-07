<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PersonnelsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'code' => $row['nrp'],
            'first_name' => ucfirst(strtolower($row['fname'])),
            'middle_name' => ucfirst(strtolower($row['mname'])),
            'last_name' => ucfirst(strtolower($row['lname'])),
        ]);
    }
}
