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
        Schema::create('districts', function (Blueprint $table) {
            $table->id('districtsID'); // Primary key
            $table->string('name'); // İlçe adı
            $table->unsignedBigInteger('citiesID'); // Şehir ile ilişki
            $table->foreign('citiesID')
                  ->references('citiesID')
                  ->on('cities')
                  ->onDelete('cascade'); // Şehir silinirse ilçeler de silinir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
