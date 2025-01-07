<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservationID'); // Rezervasyon ID
            $table->unsignedBigInteger('restaurantID'); // Restoran ID (foreign key)
            $table->unsignedBigInteger('userID'); // Kullanıcı ID (foreign key)
            $table->dateTime('reservation_time'); // Rezervasyon tarihi ve saati
            $table->integer('guest_count'); // Misafir sayısı
            $table->string('status')->default('pending'); // Rezervasyon durumu (pending, confirmed, canceled vb.)
            $table->timestamps();
            $table->softDeletes(); // Silinen rezervasyonları işaretler

            // Yabancı anahtarlar
            $table->foreign('restaurantID')->references('restaurantID')->on('restaurants')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
