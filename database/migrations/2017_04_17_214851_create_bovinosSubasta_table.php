<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBovinosSubastaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bovinosSubasta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('canal_matanza')->unsigned();
            $table->integer('canal_ingreso')->unsigned();
            $table->string('codigo');
            $table->foreign('canal_matanza')->references('id')->on('matanzaBovinos');
            $table->foreign('canal_ingreso')->references('id')->on('ingresoSubastas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bovinosSubasta');
    }
}
