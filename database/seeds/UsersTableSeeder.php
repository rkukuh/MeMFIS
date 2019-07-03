<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Super Admin',
            'email'     => 'admin@smartaircraft.id',
            'password'  => Hash::make('admin'),
        ]);

        $user->assignRole(
            Role::where('name', 'admin')->first()
        );

        $user->employee()->create([
            'code' => 'SU-' . Carbon::now()->timestamp,
            'first_name' => 'Super',
            'last_name'  => 'Admin',
        ]);
    }
}
