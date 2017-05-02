<?php

/**
 * Created by PhpStorm.
 * User: Anthony Rojas
 * Date: 3/27/2017
 * Time: 4:00 PM
 */

namespace App\Observers;

use App\Models\MatanzaBovino;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class MatanzaBovinoObserver
{
    /**
    * Listen to the User created event.
    *
    * @param  User  $user
    * @return void
    */
    public function creating(MatanzaBovino $registro)
    {
        $val = DB::table('settings')->select('canal_bovino')->get();
        $registro->canal = $val[0]->canal_bovino;
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(MatanzaBovino $registro)
    {
        DB::table('settings')->decrement('canal_bovino');
    }
}