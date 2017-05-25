<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerTotalPorcinosUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER totalPorcinosUpdate BEFORE UPDATE ON `ingresoporcinos` 
                        FOR EACH ROW SET new.total = new.machos + new.hembras;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `totalPorcinosUpdate`');
    }
}
