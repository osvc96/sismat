<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablecimientosDestinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimientosDestino', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('propietario');
            $table->string('direccion');
            $table->string('telefono');
            $table->UnsignedInteger('transportista_id')->nullable();
            $table->unsignedInteger('clienteCuero_id')->nullable();
            $table->foreign('transportista_id')->references('id')->on('transportistas');
            $table->foreign('clienteCuero_id')->references('id')->on('clientescuero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimientosDestino');
    }
}
