<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->text('message');
            $table->string('type');
            $table->string('last_type')->nullable();
            $table->boolean('read')->default(false);
            $table->string('subject');
            $table->boolean('is_from');
            $table->boolean('is_important')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_services');
    }
}
