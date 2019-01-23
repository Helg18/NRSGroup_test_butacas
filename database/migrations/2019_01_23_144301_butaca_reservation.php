<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ButacaReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butaca_reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('butaca_id');
            $table->unsignedInteger('reservation_id');
            $table->timestamps();

            $table->foreign('butaca_id')->references('id')->on('butacas');
            $table->foreign('reservation_id')->references('id')->on('reservations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('butaca_reservation');
    }
}
