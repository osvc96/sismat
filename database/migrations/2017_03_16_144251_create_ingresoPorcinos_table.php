<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoPorcinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresoPorcinos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('propietario');
            $table->string('destinos');
            $table->string('marca');
            $table->integer('machos');
            $table->integer('hembras');
            $table->integer('total');
            $table->integer('corral');
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
        Schema::dropIfExists('ingresoPorcinos');
    }
}
