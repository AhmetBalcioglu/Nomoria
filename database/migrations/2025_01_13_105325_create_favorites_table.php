<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id("favoritesID")->primary();  // Her kaydın benzersiz ID'si
            $table->unsignedBigInteger('restaurantID')->nullable();  // Restoran referansı
            $table->unsignedBigInteger('categoryID')->nullable();  // Category referansı
            $table->unsignedBigInteger('userID');  // Kullanıcı referansı
            $table->timestamps();  // Created at & Updated at

            // Dış anahtar ilişkilerini oluşturma
            $table->foreign('restaurantID')->references('restaurantID')->on('restaurant')
                ->onDelete('cascade');
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->foreign('categoryID')->references('categoryID')->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
