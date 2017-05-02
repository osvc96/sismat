<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class TransportePorcino extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    protected $table = 'transporteporcinos';
    protected $primaryKey = 'id';
     public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['IdTrasportista', 'IdDestino', 'transportista', 'destino'];
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
	
    public function canales()
    {
        return $this->hasMany('App\Models\MatanzaPorcino');
    }

    public function transportista()
    {
        return $this->hasOne('App\Models\Transportista','id');
    }

    public function destino()
    {
        return $this->hasOne('App\Models\EstablecimientoDestino','id');
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
