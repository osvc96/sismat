<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoFincaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                
            Schema::create('ingresoFierro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrePropietario');
            $table->string('destino', 15);
            $table->binary('imagen') ;
            //$table->json('detalleAnimales');
            $table->string('observaciones');
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
        Schema::dropIfExists('ingresoFierro');
    }
}
