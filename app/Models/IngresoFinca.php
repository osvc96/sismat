<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\DB;

class IngresoFinca extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    protected $table = 'ingresofincas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['guia', 'propietario_id', 'propietario','destinos', 'terneros', 'novillas','novillos', 'vacas', 'toros', 'corral', 'total', 'corral', 'observaciones'];
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
	public function productor()
    {
        return $this->belongsTo('App\Models\ProductorFinca','propietario_id');
    }

    public function canales()
    {
        return $this->hasMany('App\Models\BovinoFinca', 'canal_ingreso');
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

	public function setPropietarioIdAttribute($value)
    {
    	$productor = DB::table('productoresfinca')->where('id', $value)->first();

        $this->attributes['propietario'] = $productor->nombre;

        $this->attributes['propietario_id'] = $value;
    }

}
