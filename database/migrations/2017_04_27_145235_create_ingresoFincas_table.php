<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoFincasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresoFincas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guia');
            $table->string('propietario')->nullable();
            $table->string('destinos');
            $table->integer('idProductor')->unsigned();
            $table->string('fierro');
            $table->integer('terneras');
            $table->integer('terneros');
            $table->integer('novillas');
            $table->integer('novillos');
            $table->integer('vacas');
            $table->integer('toros');
            $table->integer('total');
            $table->string('corral');
            $table->string('observaciones');
            $table->timestamps();

            $table->foreign('idProductor')->references('id')->on('productoresFinca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresoFincas');
    }
}
