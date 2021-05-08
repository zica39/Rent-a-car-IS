<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations_accessories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('accessory_id')->nullable()->constrained('accessories');
            $table->foreignId('reservation_id')->nullable()->constrained('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations_accessories');
    }
}
