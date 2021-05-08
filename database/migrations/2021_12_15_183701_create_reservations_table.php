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
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('car_id')->nullable()->constrained('cars');

            $table->foreignId('pick_up_location')->nullable()->constrained('locations');
            $table->foreignId('return_location')->nullable()->constrained('locations');
            $table->date('pick_up_date');
            $table->date('return_date');

            $table->float('total_price');

            $table->time('pick_up_time');
            $table->time('return_time');

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
