<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        {
            $this->call([
                CitiesTableSeeder::class, // Şehirler için Seeder
                DistrictsTableSeeder::class, // İlçeler için Seeder
                UserSeeder::class, // Admin için seeder
                RestaurantsSeeder::class, // Restoranlar için seeder
                CategoriesSeeder::class,
            ]);
        }
    }
}
