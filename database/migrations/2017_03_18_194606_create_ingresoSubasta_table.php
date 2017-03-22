<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoSubastaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresoSubastas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guia');
            $table->string('propietario');
            $table->string('destinos');
            $table->string('codigoAnimales');
            $table->integer('terneras');
            $table->integer('terneros');
            $table->integer('novillas');
            $table->integer('novillos');
            $table->integer('vacas');
            $table->integer('toros');
            $table->integer('total');
            $table->string('corral');
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('ingresoSubastas');
    }
}
