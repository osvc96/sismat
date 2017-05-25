<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatanzaBovinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matanzaBovinos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('canal')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->smallInteger('color');
            $table->smallInteger('raza');
            $table->smallInteger('especie');
            $table->smallInteger('prenada');
            $table->integer('pesoPie')->nullable();
            $table->integer('pesoCanal')->nullable();
            $table->unsignedInteger('destino_id')->nullable();
            $table->unsignedInteger('ingresoFinca_id')->nullable();
            $table->unsignedInteger('ingresoSubasta_id')->nullable();
            $table->string('codigo')->nullable();
            $table->smallInteger('estado')->nullable();
            $table->timestamps();
            $table->foreign('destino_id')->references('id')->on('establecimientosDestino');
            $table->foreign('ingresoFinca_id')->references('id')->on('ingresoFincas');
            $table->foreign('ingresoSubasta_id')->references('id')->on('ingresoSubastas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matanzaBovinos');
    }

}
