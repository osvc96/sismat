<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatanzaPorcinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matanzaPorcinos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingreso_id')->unsigned();
            $table->integer('canal')->nullable();
            $table->string('color');
            $table->string('raza');
            $table->string('propietarioDestino')->nullable();
            $table->string('nivelGrasa')->nullable();
            $table->integer('pesoCanal')->nullable();
            $table->timestamps();
            $table->foreign('ingreso_id')->references('id')->on('ingresoporcinos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matanzaPorcinos');
    }
}
