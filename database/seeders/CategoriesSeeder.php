<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'categoryName' => 'Özel Günler',
                'image' => "/img/homepage_img/ozengun.jpg",
            ],
            [
                'categoryName' => 'Kutlamalar',
                'image' => "/img/homepage_img/kutlama.jpg",

            ],
            [
                'categoryName' => 'İş Yemekleri',
                'image' => "/img/homepage_img/is.jpg",

            ],
            [
                'categoryName' => 'Tek Kişilik',
                'image' => "/img/homepage_img/tek_kisi.jpg",

            ],
            [
                'categoryName' => 'Dünya Mutfağı',
                'image' => "/img/homepage_img/dunya_mutfagi.jpg",

            ],
            [
                'categoryName' => 'Et Menüleri',
                'image' => "/img/homepage_img/et.jpg",

            ],
            [
                'categoryName' => 'Balık Menüleri',
                'image' => "/img/homepage_img/balik.jpg",

            ],
            [
                'categoryName' => 'Fast Food Menüleri',
                'image' => "/img/homepage_img/fastfood.jpg",

            ],
            [
                'categoryName' => 'Vegan Menüler',
                'image' => "/img/homepage_img/vegan.png",

            ],
            [
                'categoryName' => 'Alkollü Menüler',
                'image' => "/img/homepage_img/alkol.jpg",

            ],
        ]);
    }
}
