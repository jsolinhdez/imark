<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Customer
        DB::table('users')->insert([
            [
                'full_name' => 'Solin Customer',
                'username' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('1111'),
                'status' => 'active',
            ]
        ]);
        //Admin
        DB::table('admins')->insert([
            [
                'full_name' => 'Solin Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('1111'),
                'status' => 'active',
            ]
        ]);
    }
}
