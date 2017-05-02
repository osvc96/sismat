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
    protected $fillable = ['canal', 'sexo', 'color', 'raza', 'especie', 'propietarioDestino', 'pesoPie', 'pesoCanal', 'prenada'];
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

    public function decomisos()
    {
        return $this->hasMany('App\Models\DecomisoBovino', 'canal_decomiso');
    }

    public function ingreso()
    {
        return $this->hasOne('App\Models\BovinoSubasta', 'canal_decomiso');	
    }

    public function ingresoFinca()
    {
        return $this->hasOne('App\Models\BovinoFinca', 'canal_decomiso');	
    }

    public function envio()
    {
        return $this->belongsTo('App\Models\TransporteBovino', 'id');
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