<?php
/**
 * Created by PhpStorm.
 * User: Anthony Rojas
 * Date: 3/29/2017
 * Time: 9:23 PM
 */

namespace App\Observers;


use App\Models\MatanzaPorcino;
use Illuminate\Support\Facades\DB;

class MatanzaPorcinoObserver
{
    public function creating(MatanzaPorcino $registro)
    {
        $val = DB::table('settings')->select('canal_porcino')->get();
        $registro->canal = $val[0]->canal_porcino;
    }

    public function deleting(MatanzaPorcino $registro)
    {
        DB::table('settings')->decrement('canal_porcino');
    }

}