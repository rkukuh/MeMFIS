<?php

namespace App\Imports;

use App\User;
use App\Models\Workshift;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Faker as Faker;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $faker = Faker\Factory::create();

        $user = new User([
            'name' => ucwords(strtolower($row['nama'])),
            'email' => !empty($row['email']) ? strtolower($row['email']) : str_slug(strtolower($row['nama'])) . '@example.org',
            'password' => Hash::make('employee'),
            'is_active' => $faker->boolean
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
            'last_name' => ucwords(strtolower($row['nama'])),
            'dob' => Carbon::now()->subYear(rand(20, 50)),
            'dob_place' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
            'gender' => $faker->randomElement(['m', 'f']),
            'religion' => $faker->randomElement(['islam','khonghucu','budha','kristen','hindu']),
            'marital_status' => $faker->randomElement(['s','m']),
            'nationality' => $faker->randomElement(['Indonesia','Japan','Zimbabwe','South Africa']),
            'country' => 'indonesia',
            'city' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
            'joined_date' => Carbon::now()->toDateString(),
            'updated_at' => null
        ]);

        $employee = $user->employee;

        $workshift = Workshift::first(); 

        $employee->workshifts()->attach($workshift->id, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
    }
}
