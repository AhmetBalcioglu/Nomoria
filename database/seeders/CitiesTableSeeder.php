<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // Türkiye'deki illeri veritabanına ekleyen seeder

    /*
    NOT: Sadece İstanbul kullanıldı. Eğer farklı bir il eklemek istersek buraya ve ilçelerin eklendiği seedera ekleme yapılabilir 
    */
    public function run(): void
    {
        DB::table('cities')->insert([
            ['name' => 'İstanbul'],
        ]);
    }
}
