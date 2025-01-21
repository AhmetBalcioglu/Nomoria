<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create(
            [
                'guid' => 'aa6c99c9-91f5-4bbc-b8ff-0db363572818',
                'role' => 'admin',
                'name' => 'Özlem',
                'surname' => 'ALTUN',
                'gender' => 'Kadın',
                'email' => 'ozlmaltn8@gmail.com',
                'password' => '$2y$12$w7WdWuIDGkuojAbUKGeTeetvWWJp.2L.B0aU2tQpC/jMfNGsVRjJG',
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null
            ],

        );
        Users::create(
            [
                'guid' => 'd219f9fc-2d1b-482e-add0-eb8d26f2a8db',
                'role' => 'customer',
                'name' => 'Ahmet',
                'surname' => 'BALCIOĞLU',
                'gender' => 'Erkek',
                'email' => 'a493b11@gmail.com',
                'password' => '$2y$12$tdqCXDAdvsihwhFxIQzxA.aETpYQWvuMvkjXsdR.oYM5ysAkpDrYa',
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null
            ],

        );
        Users::create(
            [
                'guid' => '9ea92aa3-05c1-4cdf-8fe4-b74b20f7caf2',
                'role' => 'restaurantOwner',
                'name' => 'Ali',
                'surname' => 'ARTUÇ',
                'gender' => 'Erkek',
                'email' => 'aliartuc00@gmail.com',
                'password' => '$2y$12$UmihSZCFX1jfwGGwDHNf9.upW6Bd1J02l6GyaoB4sFtdhCbVJQRmG',
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null
            ],

        );
        Users::create(
            [
                'guid' => '04827042-208a-456c-a09b-a68f6b8e99a9',
                'role' => 'restaurantOwner',
                'name' => 'Bektaş',
                'surname' => 'ERGİN',
                'gender' => 'Erkek',
                'email' => 'erginbeko34@gmail.com',
                'password' => '$2y$12$ZbWRd1EviDDPrSum.XmNh.Ej7rXJKR7bzcJN6BYVjkjzUpzQLhd4G',
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null
            ],

        );
    }
}
