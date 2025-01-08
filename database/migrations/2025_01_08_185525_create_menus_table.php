<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id('menuID');
            $table->unsignedBigInteger('restaurantID');
            $table->foreign('restaurantID')->references('restaurantID')->on('restaurant')->onDelete('cascade');
            $table->string('name'); // Menü adı
            $table->text('description'); // Menü açıklaması
            $table->decimal('price', 8, 2); // Menü fiyatı
            $table->timestamps(); // Oluşturulma ve güncellenme zamanları
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
}
