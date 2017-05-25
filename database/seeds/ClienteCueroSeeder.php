<?php

use Illuminate\Database\Seeder;

class ClienteCueroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientescuero')->delete();

        DB::table('clientescuero')->insert([
            [
                'nombre' => 'Eladio',
                'contacto' => '88888888'
            ],
            [
                'nombre' => 'Carnicoop',
                'contacto' => '88888888'
            ],
            [
                'nombre' => 'Manuel (Viejito)',
                'contacto' => '88888888'
            ]
        ]);
    }
}
