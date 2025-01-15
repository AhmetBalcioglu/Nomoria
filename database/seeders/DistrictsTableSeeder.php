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
            ['name' => 'Adalar', 'citiesID' => $istanbulId],
            ['name' => 'Arnavutköy', 'citiesID' => $istanbulId],
            ['name' => 'Ataşehir', 'citiesID' => $istanbulId],
            ['name' => 'Avcılar', 'citiesID' => $istanbulId],
            ['name' => 'Bağcılar', 'citiesID' => $istanbulId],
            ['name' => 'Bahçelievler', 'citiesID' => $istanbulId],
            ['name' => 'Bakırköy', 'citiesID' => $istanbulId],
            ['name' => 'Başakşehir', 'citiesID' => $istanbulId],
            ['name' => 'Bayrampaşa', 'citiesID' => $istanbulId],
            ['name' => 'Beykoz', 'citiesID' => $istanbulId],
            ['name' => 'Beylikdüzü', 'citiesID' => $istanbulId],
            ['name' => 'Beyoğlu', 'citiesID' => $istanbulId],
            ['name' => 'Büyükçekmece', 'citiesID' => $istanbulId],
            ['name' => 'Çatalca', 'citiesID' => $istanbulId],
            ['name' => 'Çekmeköy', 'citiesID' => $istanbulId],
            ['name' => 'Esenler', 'citiesID' => $istanbulId],
            ['name' => 'Esenyurt', 'citiesID' => $istanbulId],
            ['name' => 'Eyüp', 'citiesID' => $istanbulId],
            ['name' => 'Fatih', 'citiesID' => $istanbulId],
            ['name' => 'Gaziosmanpaşa', 'citiesID' => $istanbulId],
            ['name' => 'Güngören', 'citiesID' => $istanbulId],
            ['name' => 'Kadıköy', 'citiesID' => $istanbulId],
            ['name' => 'Kağıthane', 'citiesID' => $istanbulId],
            ['name' => 'Kartal', 'citiesID' => $istanbulId],
            ['name' => 'Küçükçekmece', 'citiesID' => $istanbulId],
            ['name' => 'Maltepe', 'citiesID' => $istanbulId],
            ['name' => 'Pendik', 'citiesID' => $istanbulId],
            ['name' => 'Sancaktepe', 'citiesID' => $istanbulId],
            ['name' => 'Sarıyer', 'citiesID' => $istanbulId],
            ['name' => 'Silivri', 'citiesID' => $istanbulId],
            ['name' => 'Sultanbeyli', 'citiesID' => $istanbulId],
            ['name' => 'Sultangazi', 'citiesID' => $istanbulId],
            ['name' => 'Şile', 'citiesID' => $istanbulId],
            ['name' => 'Şişli', 'citiesID' => $istanbulId],
            ['name' => 'Tuzla', 'citiesID' => $istanbulId],
            ['name' => 'Ümraniye', 'citiesID' => $istanbulId],
            ['name' => 'Üsküdar', 'citiesID' => $istanbulId],
            ['name' => 'Zeytinburnu', 'citiesID' => $istanbulId],
            // İstanbul'un diğer ilçeleri
        ]);
    }
}
