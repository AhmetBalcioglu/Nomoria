<?php

namespace Database\Seeders;

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
        Users::create([
        'userID' => 1,
        'guid' => 'aa6c99c9-91f5-4bbc-b8ff-0db363572818',
        'role' => 'admin',
        'name' => 'admin',
        'surname' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => '$2y$12$w7WdWuIDGkuojAbUKGeTeetvWWJp.2L.B0aU2tQpC/jMfNGsVRjJG',
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null
        ]);
    }
}

