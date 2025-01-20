<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'created_at' => Carbon::now(),
            ],
            [
                'categoryName' => 'Kutlamalar',
                'image' => "/img/homepage_img/kutlama.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'İş Yemekleri',
                'image' => "/img/homepage_img/is.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Tek Kişilik',
                'image' => "/img/homepage_img/tek_kisi.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Et Yemekleri',
                'image' => "/img/homepage_img/et.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Balık Yemekleri',
                'image' => "/img/homepage_img/balik.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Fast Food',
                'image' => "/img/homepage_img/fastfood.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Vegan Yemekleri',
                'image' => "/img/homepage_img/vegan.png",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Alkol Servisi',
                'image' => "/img/homepage_img/alkol.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Kore Mutfağı',
                'image' => "/img/homepage_img/kore_mutfagi.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Türk Mutfağı',
                'image' => "/img/homepage_img/turk_mutfagi.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Meksika Mutfağı',
                'image' => "/img/homepage_img/meksika_mutfagi.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'Japon Mutfağı',
                'image' => "/img/homepage_img/japon_mutfagi.jpg",
                'created_at' => Carbon::now(),

            ],
            [
                'categoryName' => 'İtalyan Mutfağı',
                'image' => "/img/homepage_img/italyan_mutfagi.jpg",
                'created_at' => Carbon::now(),

            ],
        ]);
    }
}
