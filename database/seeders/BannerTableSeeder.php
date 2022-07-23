<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
//            Banner Cars
            [
                'title' => 'new cars',
                'photo' => 'http://imark.com/storage/photos/1/2021-Cadillac-Escalade-008-1080.jpg',
                'description' => 'a lot of new and brands cars ',
                'condition' => 'banner',
                'status' => 'active',
                'slug' => 'new cars',
            ],
//            Banner Stock
            [
                'title' => 'A lot of stock',
                'photo' => 'http://imark.com/storage/photos/1/banner2.jpg',
                'description' => 'we have all what you need',
                'condition' => 'banner',
                'status' => 'active',
                'slug' => 'A lot of stock',
            ],
//            Banner Buy Online
            [
                'title' => 'Buy Online',
                'photo' => 'http://imark.com/storage/photos/1/banner1.jpg',
                'description' => 'you can vuy from your house with all garanty',
                'condition' => 'banner',
                'status' => 'active',
                'slug' => 'Buy Online',
            ]
        ]);
    }
}
