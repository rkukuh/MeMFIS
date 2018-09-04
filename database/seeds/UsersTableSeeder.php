<?php

use App\User;
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
            'email'     => 'admin@madewow.com',
            'password'  => Hash::make('admin'),
        ]);

        $user->assignRole(
            Role::where('name', 'admin')->first()
        );
    }
}
