<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHojasTransporteCanalBovinoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporte_canalBovino', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('transporte_id');
            $table->unsignedInteger('canal_id');
            $table->foreign('transporte_id')->references('id')->on('hojastransporte');
            $table->foreign('canal_id')->references('id')->on('matanzabovinos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transporte_canalBovino');
    }
}
