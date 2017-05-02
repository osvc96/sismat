<?php

use Illuminate\Database\Seeder;
use Carbon;

class IngresoSubastaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingresosubastas')->insert([
            'guia' => str_random(10),
            'propietario' => 'Melvin Salazar',
            'destinos' => 'Carniceria La Coruña',
            'codigoAnimales' => '12WER 23SDF 2Q3WR',
            'terneras' => 0,
            'terneros' => 0,
            'novillas' => 0,
            'novillos' => 2,
            'vacas' => 0,
            'toros' => 0,
            'corral' => '1',
            'observaciones' => 'Un novillo blanco tiene una cortada en la pata derecha delantera',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
