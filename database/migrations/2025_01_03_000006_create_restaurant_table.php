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
        Schema::create('restaurant', function (Blueprint $table) {
            $table->id('restaurantID');
            $table->string('guid');
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->string('image');
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->integer('capacity');  // Restoran kapasitesi
            // Şehirler tablosuyla ilişki
            $table->unsignedBigInteger('citiesID');
            $table->foreign('citiesID')->references('citiesID')->on('cities')->onDelete('cascade');
            // İlçeler tablosuyla ilişki
            $table->unsignedBigInteger('districtsID');
            $table->foreign('districtsID')->references('districtsID')->on('districts')->onDelete('cascade');
            $table->string('cuisine_type')->nullable(); // Dünya mutfağı
            $table->string('view_type')->nullable(); // Mekan türü
            $table->unsignedBigInteger('categoryID');
            $table->foreign('categoryID')->references('categoryID')->on('categories')->onDelete('cascade');
            $table->decimal('rating', 3, 1)->default(0); // Puanlama
            $table->timestamps(); // created_at ve updated_at otomatik oluşturulur
            $table->softDeletes(); // deleted_at otomatik oluşturulur
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('restaurant');
    }
};
