<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $admin = new \App\User();
        $admin->name = 'Demo User';
        $admin->email = 'kylenash94@gmail.com';
        $admin->password = Hash::make('1234');
        $admin->save();
    }
}
