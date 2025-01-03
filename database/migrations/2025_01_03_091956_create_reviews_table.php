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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('reviews_ıd')->primary();
            $table->unsignedBigInteger('restaurantID'); //restaurantID
            $table->foreign('restaurantID')->references('restaurantID')->on('restaurant');
            $table->unsignedBigInteger('user_id');      // Kullanıcı ID
            $table->text('review');                    // Yorum içeriği
            $table->unsignedTinyInteger('rating');     // Puan (1-5 arasında)
            $table->timestamps(); // created_at, updated_at, deleted_at'yi otomatik ekler
            $table->softDeletes(); // deleted_at için soft delete desteği ekler
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
