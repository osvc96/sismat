<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportePorcinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TransportePorcinos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdTransportista')->unsigned();
            $table->integer('IdDestino')->unsigned();
            $table->string('transportista');
            $table->string('destino');
            $table->timestamps();

            $table->foreign('IdTransportista')->references('id')->on('transportistas');
            $table->foreign('IdDestino')->references('id')->on('establecimientosDestino');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TransportePorcinos');
    }
}
