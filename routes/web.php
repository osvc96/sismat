<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('scan');
});




Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['admin'],
    'namespace' => 'Admin'
], function() {
    CRUD::resource('ingresoPorcino', 'ingresoPorcinoCrudController');
    CRUD::resource('ingresoSubasta', 'ingresoSubastaCrudController');
    CRUD::resource('matanzaBovino', 'MatanzaBovinoCrudController');
    CRUD::resource('ingresoFinca', 'ingresoFincaCrudController');
    CRUD::resource('bovinoSubasta', 'BovinoSubastaCrudController');
    CRUD::resource('bovinoFinca', 'BovinoFincaCrudController');
    CRUD::resource('matanzaPorcino', 'MatanzaPorcinoCrudController');
    CRUD::resource('decomisoPorcino', 'DecomisoPorcinoCrudController');
    CRUD::resource('decomisoBovino', 'DecomisoBovinoCrudController');
    CRUD::resource('productorFinca', 'ProductorFincaCrudController');
    CRUD::resource('transportista', 'TransportistaCrudController');
    CRUD::resource('establecimientoDestino', 'EstablecimientoDestinoCrudController');
    CRUD::resource('transportePorcino', 'TransportePorcinoCrudController');
    CRUD::resource('transporteBovino', 'TransporteBovinoCrudController');
    Route::get('scan', function () {
    return view('/vendor/backpack/base/scan');
    });
});