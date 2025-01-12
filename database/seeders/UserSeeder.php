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
        Users::create([
            'guid' => 'aa6c99c9-91f5-4bbc-b8ff-0db363572818',
            'role' => 'admin',
            'name' => 'admin name',
            'surname' => 'admin surname',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$w7WdWuIDGkuojAbUKGeTeetvWWJp.2L.B0aU2tQpC/jMfNGsVRjJG',
            'created_at' => Carbon::now(),
            'updated_at' => null,
            'deleted_at' => null
        ]);
    }
}
