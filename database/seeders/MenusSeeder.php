<?php

namespace Database\Seeders;

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
                'name' => 'Menü 1',
                'price' => 15,
                'description' => 'Menü 1 Açıklama'
            ],
            [
                'restaurantID' => 2,
                'name' => 'Menü 2',
                'price' => 20,
                'description' => 'Menü 2 Açıklama'
            ]
        ]);
    }
}
