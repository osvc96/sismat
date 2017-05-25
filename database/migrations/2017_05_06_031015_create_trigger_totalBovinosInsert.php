<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerTotalBovinosInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER totalBovinosInsert BEFORE INSERT ON `ingresosubastas`
                        FOR EACH ROW SET new.total = new.terneros + new.novillas + new.novillos + new.vacas + new.toros;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `totalBovinosInsert`');
    }
}
