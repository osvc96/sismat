<?php

use Illuminate\Database\Seeder;

class TransportistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transportistas')->delete();

        DB::table('transportistas')->insert([
            [
            'nombre' => 'Vinicio Quesada',
                'telefono' => '88888888'
            ],
            [
                'nombre' => 'Damaris Núñez',
                'telefono' => '88888888'
            ],
            [
                'nombre' => 'Alexander Parrales',
                'telefono' => '88888888'
            ],
            [
                'nombre' => 'Eladio Ramírez',
                'telefono' => '88888888'
            ],
            [
                'nombre' => 'Super Su Casa',
                'telefono' => '88888888'
            ],
            [
                'nombre' => 'Marvin Leitón',
                'telefono' => '88888888'
            ],

            [
                'nombre' => 'Corporación KAISA',
                'telefono' => '88888888'
            ]
        ]);
    }
}
