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
            $table->char('sexo', 1);
            $table->string('color');
            $table->string('raza');
            $table->string('especie');
            $table->string('propietarioDestino')->nullable();
            $table->integer('pesoPie');
            $table->integer('pesoCanal')->nullable();
            $table->string('prenada')->nullable();
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
        Schema::dropIfExists('matanzaBovinos');
    }

}
