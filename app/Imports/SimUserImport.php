<?php

namespace App\Imports;

use App\User;
use Carbon\Carbon;
use App\Models\Type;
use App\Models\Status;
use App\Models\Country;
use App\Models\Religion;
use App\Models\Workshift;
use App\Models\Nationality;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Faker as Faker;

class SimUserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::where('email', $row['enmail'])->first();

        if(empty($user)){
            $faker = Faker\Factory::create();

            $name = $row['first_name'].' '.$row['last_name'];
            $user = new User([
                'name' => ucwords(strtolower($name)),
                'email' => !empty($row['email']) ? strtolower($row['email']) : str_slug(strtolower($row['nama'])) . '@example.org',
                'password' => Hash::make($row['passwords']),
                'is_active' => 1
            ]);

            $user->save();

            $role = Role::where('name', $row['roles'])->first();

            $user->assignRole($role);

            $employee = [
                'code' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'first_name' => ucwords(strtolower($row['first_name'])),
                'last_name' => ucwords(strtolower($row['last_name'])),
                'dob' => Carbon::now()->subYear(rand(20, 50)),
                'dob_place' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
                'gender_id' => Type::ofGender()->where('code', $faker->randomElement(['male','female']))->first()->id,
                'religion_id' => Religion::where('code', $faker->randomElement(['christian-protestant','islam','kong-hu-cu','buddha','catholic','hindu']))->first()->id,
                'marital_id' => Status::ofMarital()->where('code', $faker->randomElement(['married','single','cerai-hidup','cerai-mati']))->first()->id,
                'country_id' => Country::first()->id,
                'city' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
                'joined_date' => Carbon::now()->toDateString(),
                'updated_at' => null
            ];

            $user->employee()->create($employee);

            $employee = $user->employee;

            $workshift = Workshift::find($faker->randomElement([1,2]));

            $employee->workshifts()->attach($workshift->id, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);

            $employee->nationalities()->attach(Nationality::first()->id, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
        }


    }
}
