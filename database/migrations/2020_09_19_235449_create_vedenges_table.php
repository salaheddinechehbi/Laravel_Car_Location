<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVedengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videnges', function (Blueprint $table) {
            $table->id();
            $table->date('date_videnge');
            $table->bigInteger('km');
            $table->text('desc');
            $table->unsignedBigInteger('car_id')->default(0);
            $table->foreign('car_id')->references('id')->on('cars');
            $table->unsignedBigInteger('user_id')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vedenges');
    }
}
