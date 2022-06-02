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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('flight_id');
            $table->string('passenger_name');
            $table->string('passenger_email');
            $table->string('passenger_phone');
            $table->string('passenger_passport');
            $table->string('reservation_code')->nullable();
            $table->string('origin');
            $table->string('destination');
            $table->string('airline');
            $table->date('boarding_time');
            $table->date('arrival_time');
            $table->time('boarding_hour');
            $table->time('arrival_hour');
            $table->string('seat');
            $table->float('price')->default(0.00);
            $table->timestamps();
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
