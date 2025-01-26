<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailImage extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_image')->insert([
            [
                'image' => '/img/menu/alkol/alkol.jpg',
                'image2' => '/img/menu/alkol/divan1.jpg',
                'image3' => '/img/menu/alkol/divan2.jpg',
                'image4' => '/img/menu/alkol/zeytin1.png',
                'image5' => '/img/menu/alkol/zeytin2.png',
                'image6' => '/img/menu/alkol/zeytin3.png',
            ],
            [
                'image' => '/img/menu/balik/balikResto.jpg',
                'image2' => '/img/menu/balik/tuzla2.jpg',
                'image3' => '/img/menu/balik/tuzla3.jpg',
                'image4' => '/img/menu/balik/tuzla4.jpg',
                'image5' => '/img/menu/balik/tuzla5.jpg',
                'image6' => '/img/menu/balik/tuzla6.jpg',
            ],
            [
                'image' => '/img/menu/et/et.jpg',
                'image2' => '/img/menu/et/et2.jpg',
                'image3' => '/img/menu/et/kebabpTuzla1.jpg',
                'image4' => '/img/menu/et/kebapTuzla2.jpg',
                'image5' => '/img/menu/et/kebapTuzla5.jpg',
                'image6' => '/img/menu/et/mia1.jpg',
            ],
            [
                'image' => '/img/menu/fastfood/coni1.jpg',
                'image2' => '/img/menu/fastfood/fast.jpg',
                'image3' => '/img/menu/fastfood/fast2.jpg',
                'image4' => '/img/menu/fastfood/fastFood.jpg',
                'image5' => '/img/menu/fastfood/fastFood2.jpg',
                'image6' => '/img/menu/fastfood/pizza.jpg',
            ],
            [
                'image' => '/img/menu/vegan/vegan1.jpg',
                'image2' => '/img/menu/vegan/vegan2.jpg',
                'image3' => '/img/menu/vegan/vegan3.jpg',
                'image4' => '/img/menu/vegan/vegan4.jpg',
                'image5' => '/img/menu/vegan/vegan5.jpg',
                'image6' => '/img/menu/vegan/vegan6.jpg',
            ]
        ]);
    }
}
