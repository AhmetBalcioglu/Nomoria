<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id('menuID');  // Menü ID'si
            $table->foreignId('restaurantID')->constrained('restaurant')->onDelete('cascade');  // Restoran ID'si
            $table->string('name');  // Menü öğesinin adı (örneğin, yemek adı)
            $table->text('description');  // Menü öğesinin açıklaması
            $table->decimal('price', 8, 2);  // Menü öğesinin fiyatı
            $table->timestamps();  // Tarih ve saat
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
