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
        DB::table('users')->insert([
//            Admin
            [
                'full_name' => 'Solin Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('1111'),
                'role' => 'admin',
                'status' => 'active',
            ],
//            Vendor
            [
                'full_name' => 'Solin Seller',
                'username' => 'Seller',
                'email' => 'seller@gmail.com',
                'password' => bcrypt('1111'),
                'role' => 'seller',
                'status' => 'active',
            ],
//            Customer
            [
                'full_name' => 'Solin Customer',
                'username' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('1111'),
                'role' => 'customer',
                'status' => 'active',
            ]
        ]);
    }
}
