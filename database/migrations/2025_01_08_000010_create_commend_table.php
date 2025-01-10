<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('restaurantID');
                $table->string('user_name');
                $table->integer('rating');
                $table->text('comment')->nullable();
                $table->timestamps();

            $table->foreign('restaurantID')->references('restaurantID')->on('restaurant')->onDelete('cascade');
        });
    }}

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
