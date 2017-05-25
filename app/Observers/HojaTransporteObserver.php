<?php

namespace App\Observers;

use App\Models\HojaTransporte;
use Illuminate\Support\Facades\DB;

class HojaTransporteObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(HojaTransporte $hojaTransporte)
    {
    	$canalesBovinos = DB::table('matanzabovinos')
                ->join('establecimientosDestino', 'matanzabovinos.destino_id', '=', 'establecimientosDestino.id')
                ->select('matanzabovinos.id')
                ->where('establecimientosDestino.transportista_id', '=', $hojaTransporte->id_transportista)
                ->where('matanzabovinos.estado', '=', 1)
                ->get();

        $canalesPorcinos = DB::table('matanzaporcinos')
                ->join('establecimientosDestino', 'matanzaporcinos.destino_id', '=', 'establecimientosDestino.id')
                ->select('matanzaporcinos.id')
                ->where('establecimientosDestino.transportista_id', '=', $hojaTransporte->id_transportista)
                ->where('matanzaporcinos.estado', '=', 1)
                ->get();

        foreach ($canalesBovinos as $canal) {
        	$hojaTransporte->canalesBovino()->attach($canal);
        }

        foreach ($canalesPorcinos as $canal) {
        	$hojaTransporte->canalesPorcino()->attach($canal);
        }
        
    }
}