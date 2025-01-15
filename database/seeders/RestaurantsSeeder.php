<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('restaurant')->insert([
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Ahmet Restoran',
                'description' => 'Açıklama',
                'address' => 'Adres',
                'phone' => '0555555555',
                'email' => 'ahmet@gmail.com',
                'capacity' => 10,
                'citiesID' => 1,
                'districtsID' => 6,
                'cuisine_type' => 'Kore Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'İş Yemeği',
                'image' => '/img/seederImages/is.jpg'

            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Bektaş Restoran',
                'description' => 'Açıklama 2',
                'address' => 'Adres 2',
                'phone' => '06666666666',
                'email' => 'bektas@gmail.com',
                'capacity' => 5,
                'citiesID' => 1,
                'districtsID' => 1,
                'cuisine_type' => 'Kore Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/kutlama.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Özlem Katip Restoran',
                'description' => 'Açıklama 3',
                'address' => 'Adres 3',
                'phone' => '01111111111',
                'email' => 'ozlem@gmail.com',
                'capacity' => 24,
                'citiesID' => 1,
                'districtsID' => 2,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/kutlama.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Ali Restoran',
                'description' => 'Açıklama 3',
                'address' => 'Adres 3',
                'phone' => '03333333333',
                'email' => 'ali@gmail.com',
                'capacity' => 5,
                'citiesID' => 1,
                'districtsID' => 6,
                'cuisine_type' => 'Japon Mutfağı',
                'view_type' => 'Tarihi Mekan',
                'concept' => 'Özel Gün',
                'image' => '/img/seederImages/ozel_gun.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Pınar Restoran',
                'description' => 'Açıklama 4',
                'address' => 'Adres 4',
                'phone' => '04444444444',
                'email' => 'pinar@gmail.com',
                'capacity' => 2,
                'citiesID' => 1,
                'districtsID' => 12,
                'cuisine_type' => 'İtalyan Mutfağı',
                'view_type' => 'Şehir Manzarası',
                'concept' => 'Tek Kişilik',
                'image' => '/img/seederImages/tek_kisi.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Sema Restoran',
                'description' => 'Açıklama 5',
                'address' => 'Adres 5',
                'phone' => '06666666666',
                'email' => 'sema@gmail.com',
                'capacity' => 3,
                'citiesID' => 1,
                'districtsID' => 1,
                'cuisine_type' => 'Meksika Mutfağı',
                'view_type' => 'Doğanın İçinde',
                'concept' => 'Tek Kişilik',
                'image' => '/img/seederImages/ozel_gun.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Furkan Restoran',
                'description' => 'Açıklama 6',
                'address' => 'Adres 6',
                'phone' => '08888888888',
                'email' => 'furkan@gmail.com',
                'capacity' => 8,
                'citiesID' => 1,
                'districtsID' => 12,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/alkol.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Tuğçe Restoran',
                'description' => 'Açıklama 7',
                'address' => 'Adres 7',
                'phone' => '07777777777',
                'email' => 'tugce@gmail.com',
                'capacity' => 14,
                'citiesID' => 1,
                'districtsID' => 6,
                'cuisine_type' => 'Japon Mutfağı',
                'view_type' => 'Tarihi Mekan',
                'concept' => 'Özel Gün',
                'image' => '/img/seederImages/balik.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Aylin Restoran',
                'description' => 'Açıklama 8',
                'address' => 'Adres 8',
                'phone' => '02222222222',
                'email' => 'aylin@gmail.com',
                'capacity' => 7,
                'citiesID' => 1,
                'districtsID' => 10,
                'cuisine_type' => 'Japon Mutfağı',
                'view_type' => 'Tarihi Mekan',
                'concept' => 'Özel Gün',
                'image' => '/img/seederImages/ozel_gun.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Aysun Restoran',
                'description' => 'Açıklama 9',
                'address' => 'Adres 9',
                'phone' => '03333333333',
                'email' => 'aysun@gmail.com',
                'capacity' => 11,
                'citiesID' => 1,
                'districtsID' => 8,
                'cuisine_type' => 'Japon Mutfağı',
                'view_type' => 'Şehir Manzarası',
                'concept' => 'Tek Kişilik',
                'image' => '/img/seederImages/tek_kisi.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Tuzla Balıkçısı',
                'description' => 'Açıklama 9',
                'address' => 'Tuzla',
                'phone' => '03333333333',
                'email' => 'balıkcı@gmail.com',
                'capacity' => 20,
                'citiesID' => 1,
                'districtsID' => 35,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Tek Kişilik',
                'image' => '/img/seederImages/balik.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Jazz Coffee Tuzla',
                'description' => 'Açıklama 9',
                'address' => 'Tuzla',
                'phone' => '03333333333',
                'email' => 'jazzcoffee@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 35,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Tek Kişilik',
                'image' => '/img/seederImages/balik.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Mama Mia Restoran Tuzla',
                'description' => 'Açıklama 9',
                'address' => 'Tuzla',
                'phone' => '03333333333',
                'email' => 'mamamia@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 35,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Şehir Manzarası',
                'concept' => 'Tek Kişilik',
                'image' => '/img/seederImages/tek_kisi.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Ayaz Izgara Tuzla',
                'description' => 'Açıklama 9',
                'address' => 'Tuzla',
                'phone' => '03333333333',
                'email' => 'ayaz_ızgara@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 35,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Şehir Manzarası',
                'concept' => 'Tek Kişilik',
                'image' => '/img/seederImages/tek_kisi.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Legume Cafe & Bakery',
                'description' => 'Açıklama 9',
                'address' => 'Tuzla',
                'phone' => '03333333333',
                'email' => 'legume_cafe@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 35,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Şehir Manzarası',
                'concept' => 'Özel Gün',
                'image' => '/img/seederImages/ozel_gun.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'The North Shield',
                'description' => 'Açıklama 9',
                'address' => 'Tuzla',
                'phone' => '03333333333',
                'email' => 'north_shield@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 35,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Şehir Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/kutlama.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Zeytin Tuzla',
                'description' => 'Açıklama 9',
                'address' => 'Tuzla',
                'phone' => '03333333333',
                'email' => 'zeytintuzla@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 35,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/fastfood.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Kebap Tuzla',
                'description' => 'Açıklama 9',
                'address' => 'Tuzla',
                'phone' => '03333333333',
                'email' => 'kebaptuzla@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 35,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/fastfood.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Tiara Restoran Adalar',
                'description' => 'Açıklama 9',
                'address' => 'Adalar',
                'phone' => '03333333333',
                'email' => 'tiara@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 1,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/fastfood.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Mimoza Restoran Adalar',
                'description' => 'Açıklama 9',
                'address' => 'Adalar',
                'phone' => '03333333333',
                'email' => 'mimoza@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 1,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Özel Gün',
                'image' => '/img/seederImages/ozel_gun.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Büyükada LocAda',
                'description' => 'Açıklama 9',
                'address' => 'Adalar',
                'phone' => '03333333333',
                'email' => 'büyükadalocada@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 1,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'İş Yemeği',
                'image' => '/img/seederImages/is.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Heyamola Restoran Adalar',
                'description' => 'Açıklama 9',
                'address' => 'Adalar',
                'phone' => '03333333333',
                'email' => 'heyamola@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 1,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Tek Kişilik',
                'image' => '/img/seederImages/tek_kisi.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Kutlama Restoran Adalar',
                'description' => 'Açıklama 9',
                'address' => 'Adalar',
                'phone' => '03333333333',
                'email' => 'kutlamarestoran@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 1,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/kutlama.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Palya Restoran Adalar',
                'description' => 'Açıklama 9',
                'address' => 'Adalar',
                'phone' => '03333333333',
                'email' => 'palyarestoran@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 1,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/kutlama.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Mira Balık Arnavutköy',
                'description' => 'Açıklama 9',
                'address' => 'Arnavutköy',
                'phone' => '03333333333',
                'email' => 'mirabalık@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 2,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/kutlama.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Doğa Kır Lokantası Arnavutköy',
                'description' => 'Açıklama 9',
                'address' => 'Arnavutköy',
                'phone' => '03333333333',
                'email' => 'dogakir@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 2,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/kutlama.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Coni&Co Restoran Arnavutköy',
                'description' => 'Açıklama 9',
                'address' => 'Arnavutköy',
                'phone' => '03333333333',
                'email' => 'coni@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 2,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Özel Gün',
                'image' => '/img/seederImages/ozel_gun.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Madre Arnavutköy',
                'description' => 'Açıklama 9',
                'address' => 'Arnavutköy',
                'phone' => '03333333333',
                'email' => 'madre@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 2,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Şehir Manzarası',
                'concept' => 'İş Yemeği',
                'image' => '/img/seederImages/is.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Bi-Resto Arnavutköy',
                'description' => 'Açıklama 9',
                'address' => 'Arnavutköy',
                'phone' => '03333333333',
                'email' => 'biresto@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 2,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Deniz Manzarası',
                'concept' => 'Tek Kişilik',
                'image' => '/img/seederImages/tek_kisi.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Antica Lokantası Arnavutköy',
                'description' => 'Açıklama 9',
                'address' => 'Arnavutköy',
                'phone' => '03333333333',
                'email' => 'antica@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 2,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Şehir Manzarası',
                'concept' => 'Kutlama',
                'image' => '/img/seederImages/kutlama.jpg'
            ],
            [
                'guid' => Str::uuid()->toString(),
                'name' => 'Nokta Tesisleri Arnavutköy',
                'description' => 'Açıklama 9',
                'address' => 'Arnavutköy',
                'phone' => '03333333333',
                'email' => 'nokta@gmail.com',
                'capacity' => 35,
                'citiesID' => 1,
                'districtsID' => 2,
                'cuisine_type' => 'Türk Mutfağı',
                'view_type' => 'Doğanın İçinde',
                'concept' => 'Özel Gün',
                'image' => '/img/seederImages/ozel_gun.jpg'
            ]












        ]);
    }
}
