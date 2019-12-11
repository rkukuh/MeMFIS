<?php

namespace App\Imports;

use App\User;
use App\Models\Type;
use App\Models\Status;
use App\Models\Department;
use App\Models\Country;
use App\Models\Religion;
use App\Models\Workshift;
use App\Models\Nationality;
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
        $now = Carbon::now();

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

        $employee = [
            'code' => $row['nrp'],
            'first_name' => ucwords(strtolower($row['nama'])),
            'last_name' => ucwords(strtolower($row['nama'])),
            'dob' => Carbon::now()->subYear(rand(20, 50)),
            'dob_place' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
            'gender_id' => Type::ofGender()->where('code', $faker->randomElement(['male','female']))->first()->id,
            'religion_id' => Religion::where('code', $faker->randomElement(['christian-protestant','islam','kong-hu-cu','buddha','catholic','hindu']))->first()->id,
            'marital_id' => Status::ofMarital()->where('code', $faker->randomElement(['married','single','cerai-hidup','cerai-mati']))->first()->id,
            'country_id' => Country::first()->id,
            'city' => $faker->randomElement(['Surabaya','Jakarta','Sidoarjo','Gresik']),
            'joined_date' => Carbon::now()->toDateString()
        ]; 

        $user->employee()->create($employee);
        $departmentSize = Department::count('id');
        $department = Department::where('id', rand(1, $departmentSize) )->first();

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

        $employee->department()->attach($department->id, [
            'joined_at' => $now,
            'left_at' => null,
            'maximum_overtime_period' => $department->maximum_period,
            'overtime_threshold' => Carbon::createMidnightDate($now->year, $now->month, $now->day)->addHours(6),
            'overtime_allowance' => $department->maximum_holiday
        ]);

        if(rand(0,1)){
            $current_department = $employee->department->first()->id;
            $department = Department::where('id', rand(1, $departmentSize ) )->first();
            $employee->department()->updateExistingPivot($current_department, ['deleted_at' => Carbon::now()   ]);

            if($current_department == $department->id){
                $department->id = Department::find($department->id + 1);

                $employee->department()->attach($department->id, [
                    'joined_at' => $now,
                    'left_at' => null,
                    'maximum_overtime_period' => $department->maximum_period,
                    'overtime_threshold' => Carbon::createMidnightDate($now->year, $now->month, $now->day)->addHours(6),
                    'overtime_allowance' => $department->maximum_holiday
                ]);
            }else{
                $employee->department()->attach($department->id, [
                    'joined_at' => $now,
                    'left_at' => null,
                    'maximum_overtime_period' => $department->maximum_period,
                    'overtime_threshold' => Carbon::createMidnightDate($now->year, $now->month, $now->day)->addHours(6),
                    'overtime_allowance' => $department->maximum_holiday
                ]);
            }
        }
    }
}
