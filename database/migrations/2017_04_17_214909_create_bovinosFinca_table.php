<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBovinosFincaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bovinosFinca', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('canal_matanza')->unsigned();
            $table->integer('canal_ingreso')->unsigned();
            $table->string('fierro');
            $table->foreign('canal_matanza')->references('id')->on('matanzaBovinos');
            $table->foreign('canal_ingreso')->references('id')->on('ingresoFincas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('bovinosFinca');
    }
}
