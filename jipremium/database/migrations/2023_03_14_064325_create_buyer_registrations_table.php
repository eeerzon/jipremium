<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('id_order');
            $table->string('id_event');
            $table->string('first_name');
            $table->string('email');
            $table->bigInteger('phone');
            $table->json('data_buyer');
            $table->json('data_addform');
            $table->string('platform');
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
        Schema::dropIfExists('buyer_registrations');
    }
}
