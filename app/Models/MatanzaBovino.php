<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class MatanzaBovino extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    protected $table = 'matanzaBovinos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['canal', 'sexo', 'color', 'raza', 'especie', 'prenada', 'pesoPie', 'pesoCanal', 'destino_id', 'ingresoFinca_id', 'ingresoSubasta_id', 'codigo', 'estado'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

    public function destino()
    {
        return $this->belongsTo('App\Models\EstablecimientoDestino','destino_id');
    }

    public function ingresoFinca()
    {
        return $this->belongsTo('App\Models\IngresoFinca','ingresoFinca_id');
    }

    public function ingresoSubasta()
    {
        return $this->belongsTo('App\Models\ingresoSubasta','ingresoSubasta_id');
    }



    /*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/

    


}