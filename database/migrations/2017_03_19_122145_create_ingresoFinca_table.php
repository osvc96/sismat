<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoFincaTable extends Migration
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
            $table->integer('propietario_id')->unsigned();
            $table->string('propietario')->nullable();
            $table->string('guia');
            $table->string('destinos');
            $table->integer('terneros');
            $table->integer('novillas');
            $table->integer('novillos');
            $table->integer('vacas');
            $table->integer('toros');
            $table->integer('total')->nullable();
            $table->string('corral')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
            $table->foreign('propietario_id')->references('id')->on('productoresFinca');
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
