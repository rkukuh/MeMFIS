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
        $user = new User([
            'name' => ucfirst(strtolower($row['nama'])),
            'email' => !empty($row['email']) ? strtolower($row['email']) : str_slug(strtolower($row['nama'])) . '@example.org',
            'password' => Hash::make('aaa'),
        ]);

        $user->save();

        $user->assignRole(
            Role::where('name', 'employee')->first()
        );
    }
}
