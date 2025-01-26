<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discount_restaurants')->insert([
            [
                'restaurantID' => 20,
                'created_at' => Carbon::now()
            ],
            [
                'restaurantID' => 25,
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 13,
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 125,
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 119,
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 66,
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 7,
                'created_at' => Carbon::now(),
            ],
            [
                'restaurantID' => 8,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
