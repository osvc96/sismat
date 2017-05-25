<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecomisosBovinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('decomisoBovinos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('canal_decomiso')->unsigned();
            $table->string('organo');
            $table->string('enfermedad');
            $table->foreign('canal_decomiso')->references('id')->on('matanzaBovinos');
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
        Schema::dropIfExists('decomisoBovinos');
    }
}
