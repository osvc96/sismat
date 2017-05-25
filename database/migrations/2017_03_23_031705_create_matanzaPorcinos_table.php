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
            $table->unsignedInteger('ingreso_id')->nullable();
            $table->integer('canal')->nullable();
            $table->smallInteger('color');
            $table->smallInteger('raza');
            $table->smallInteger('sexo');
            $table->unsignedInteger('destino_id')->nullable();
            $table->string('nivelGrasa')->nullable();
            $table->integer('pesoCanal')->nullable();
            $table->smallInteger('estado')->nullable();
            $table->timestamps();
            $table->foreign('ingreso_id')->references('id')->on('ingresoporcinos');
            $table->foreign('destino_id')->references('id')->on('establecimientosDestino');
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
