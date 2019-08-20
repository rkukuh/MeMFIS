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
            'name' => ucwords(strtolower($row['nama'])),
            'email' => !empty($row['email']) ? strtolower($row['email']) : str_slug(strtolower($row['nama'])) . '@example.org',
            'password' => Hash::make('employee'),
        ]);

        $user->save();

        if ($user->name == 'Chandra Dwiarini Kusumawardani' || 
            $user->name == 'Irwan Ruswandono' ||
            $user->name == 'Endra Budi Hermawan')
        {
                $user->assignRole(
                    Role::where('name', 'hrd')->first()
                );
        } 
        else {
            $user->assignRole(
                Role::where('name', 'employee')->first()
            );
        }

        $user->employee()->create([
            'code' => $row['nrp'],
            'first_name' => ucwords(strtolower($row['nama'])),
        ]);
    }
}
