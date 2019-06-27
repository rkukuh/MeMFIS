<?php

use App\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, config('memfis.dummies.users'))->create();
    }
}
