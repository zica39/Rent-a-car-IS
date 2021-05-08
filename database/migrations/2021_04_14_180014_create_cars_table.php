<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('registration_number');
            $table->integer('age');
            $table->integer('seats_number');
            $table->string('fuel_type');
            $table->boolean('is_automatic');
            $table->float('price');
            $table->text('notes')->nullable();
            $table->string('photos')->nullable();
            $table->foreignId('class_id')->nullable()->constrained('cars_classes');
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
        Schema::dropIfExists('cars');
    }
}
