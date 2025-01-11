<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // İstanbul'un citiesID'sini kontrol edin (örneğin 1)
         $istanbulId = 1; // Burayı kontrol edin, eğer farklıysa doğru id'yi kullanın.

         DB::table('districts')->insert([
             ['name' => 'Kadıköy', 'citiesID' => $istanbulId],
             ['name' => 'Üsküdar', 'citiesID' => $istanbulId],
             ['name' => 'Beşiktaş', 'citiesID' => $istanbulId],
             ['name' => 'Fatih', 'citiesID' => $istanbulId],
             ['name' => 'Beyoğlu', 'citiesID' => $istanbulId],
             ['name' => 'Bağcılar', 'citiesID' => $istanbulId],
             ['name' => 'Sarıyer', 'citiesID' => $istanbulId],
             ['name' => 'Kartal', 'citiesID' => $istanbulId],
             ['name' => 'Şişli', 'citiesID' => $istanbulId],
             ['name' => 'Esenler', 'citiesID' => $istanbulId],
             ['name' => 'Maltepe', 'citiesID' => $istanbulId],
             ['name' => 'Pendik', 'citiesID' => $istanbulId],
             ['name' => 'Bakırköy', 'citiesID' => $istanbulId],
             ['name' => 'Zeytinburnu', 'citiesID' => $istanbulId],
             ['name' => 'Beylikdüzü', 'citiesID' => $istanbulId],
             // İstanbul'un diğer ilçeleri
         ]);
     
    }
}
