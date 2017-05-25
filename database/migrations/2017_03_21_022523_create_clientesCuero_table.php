<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesCueroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientescuero', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('contacto');
            $table->unsignedInteger('id_transportista')->nullable();
            $table->foreign('id_transportista')->references('id')->on('transportistasCuero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientescuero');
    }
}
