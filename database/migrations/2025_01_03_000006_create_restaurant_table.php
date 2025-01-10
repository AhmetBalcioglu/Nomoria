<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant', function (Blueprint $table) {
            $table->id('restaurantID');
            $table->string('guid');
            $table->string('image');
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->integer(column: 'phone');
            $table->string('email')->unique();
            $table->integer('capacity');  // Restoran kapasitesi
            $table->string('cuisine_type'); // Dünya mutfağı
            $table->string('view_type'); // Mekan türü
            $table->string('concept'); // Konsept
            $table->decimal('rating', 3, 1)->default(0); // Puanlama
            $table->string('open_hours'); // Çalışma saatleri
            $table->string('features')->nullable(); // Özel özellikler (Wi-Fi, otopark)
            
            // Şehirler tablosuyla ilişki
            $table->unsignedBigInteger('citiesID');//
            $table->foreign('citiesID')
                  ->references('citiesID')
                  ->on('cities')
                  ->onDelete('cascade');
            
            // İlçeler tablosuyla ilişki
            $table->unsignedBigInteger('districtsID');
            $table->foreign('districtsID')
                  ->references('districtsID')
                  ->on('districts')
                  ->onDelete('cascade');

            $table->timestamps(); // created_at ve updated_at otomatik oluşturulur
            $table->softDeletes(); // deleted_at otomatik oluşturulur
            
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('restaurant');
    }
};
