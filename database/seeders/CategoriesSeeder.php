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
                'categoryName' => 'Et Yemekleri',
                'image' => "/img/homepage_img/et.jpg",

            ],
            [
                'categoryName' => 'Balık Yemekleri',
                'image' => "/img/homepage_img/balik.jpg",

            ],
            [
                'categoryName' => 'Fast Food',
                'image' => "/img/homepage_img/fastfood.jpg",

            ],
            [
                'categoryName' => 'Vegan Yemekleri',
                'image' => "/img/homepage_img/vegan.png",

            ],
            [
                'categoryName' => 'Alkol Servisi',
                'image' => "/img/homepage_img/alkol.jpg",

            ],
            [
                'categoryName' => 'Kore Mutfağı',
                'image' => "/img/homepage_img/kore_mutfagi.jpg",

            ],
            [
                'categoryName' => 'Türk Mutfağı',
                'image' => "/img/homepage_img/turk_mutfagi.jpg",

            ],
            [
                'categoryName' => 'Meksika Mutfağı',
                'image' => "/img/homepage_img/meksika_mutfagi.jpg",

            ],
            [
                'categoryName' => 'Japon Mutfağı',
                'image' => "/img/homepage_img/japon_mutfagi.jpg",

            ],
            [
                'categoryName' => 'İtalyan Mutfağı',
                'image' => "/img/homepage_img/italyan_mutfagi.jpg",

            ],
        ]);
    }
}
