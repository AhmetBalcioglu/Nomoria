<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'restaurantID' => 1,
                'menuName' => 'Et Yemekleri',
                'price' => 15,
                'description' => 'Menü 1 Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 1,
                'menuName' => 'Balık Yemekleri',
                'price' => 15,
                'description' => 'Menü 2 Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 1,
                'menuName' => 'Alkol Servisi',
                'price' => 15,
                'description' =>
                'Menü 3 Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 2,
                'menuName' => 'Et Yemekleri',
                'price' => 20,
                'description' =>
                'Menü 1 Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 2,
                'menuName' => 'Fast Food',
                'price' => 20,
                'description' =>
                'Menü 2 Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 3,
                'menuName' => 'Vegan Yemekleri',
                'price' => 20,
                'description' =>
                'Menü 1 Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 4,
                'menuName' => 'Et Yemekleri',
                'price' => 15,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 5,
                'menuName' => 'Balık Yemekleri',
                'price' => 15,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 6,
                'menuName' => 'Vegan Yemekleri',
                'price' => 15,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 6,
                'menuName' => 'Alkol Servisi',
                'price' => 15,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 7,
                'menuName' => 'Fast Food',
                'price' => 15,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 7,
                'menuName' => 'Et Yemekleri',
                'price' => 20,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 8,
                'menuName' => 'Balık Yemekleri',
                'price' => 20,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 8,
                'menuName' => 'Vegan Yemekleri',
                'price' => 20,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 9,
                'menuName' => 'Alkol Servisi',
                'price' => 20,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 10,
                'menuName' => 'Fast Food',
                'price' => 20,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 11,
                'menuName' => 'Et Yemekleri',
                'price' => 25,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 12,
                'menuName' => 'Balık Yemekleri',
                'price' => 25,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 12,
                'menuName' => 'Vegan Yemekleri',
                'price' => 25,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 13,
                'menuName' => 'Alkol Servisi',
                'price' => 25,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 13,
                'menuName' => 'Fast Food',
                'price' => 25,
                'description' => 'Menü Açıklama',
                'created_at' => Carbon::now(),
            ],

            //TODO: Her restoranID için Menü eklenecek

        ]);
    }
}
