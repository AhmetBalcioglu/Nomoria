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
        Schema::create('viewed_restaurants', function (Blueprint $table) {
            $table->id("viewedRestaurantID")->primary();
            $table->unsignedBigInteger('userID');
            $table->char('guestID',36)->nullable();
            $table->unsignedBigInteger('restaurantID');
            $table->timestamp('viewed_at')->useCurrent();
            $table->timestamps();
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->foreign('restaurantID')->references('restaurantID')->on('restaurant')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewed_restaurants');
    }
};
