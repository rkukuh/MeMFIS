<?php

namespace App\Imports;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Register them as an employee first...,

        $employee = new Employee([
            'code' => $row['nrp'],
            'first_name' => ucfirst(strtolower($row['nama'])),
        ]);

        // ...then give them access (as User account)

        $user = $employee->user()->create([
            'name' => null,
            'email' => !empty($row['email']) ? strtolower($row['email']) : str_slug(strtolower($row['nama'])) . '@example.org',
            'password' => Hash::make('aaa'),
        ]);

        $user->save();

        $user->assignRole(
            Role::where('name', 'employee')->first()
        );
    }
}
