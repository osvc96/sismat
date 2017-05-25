<?php

use Illuminate\Database\Seeder;

class EstablecimientosDestinoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('establecimientosDestino')->delete();

        DB::table('establecimientosDestino')->insert([
        	//Transportista
        	[
            'nombre' => 'La Única 1',
            'propietario' => 'Carlos Jarquín',
            'telefono' => '2469-9130',
            'direccion' => 'pendiente',
            'transportista_id' => 1,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'La Única 2',
            'propietario' => 'Pascual Jarquín',
            'telefono' => '2469-5130',
            'direccion' => 'pendiente',
            'transportista_id' => 1,
            'clienteCuero_id' => NULL
	        ],
	        [
            'nombre' => 'Centro Carnes Muelle',
            'propietario' => 'Macho Retana',
            'telefono' => '2469-9037',
            'direccion' => 'pendiente',
            'transportista_id' => 1,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnicería Don Miguel',
            'propietario' => 'Vinicio Quesada',
            'telefono' => '8396-3635',
            'direccion' => 'pendiente',
            'transportista_id' => 1,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'La Central',
            'propietario' => 'Tobías Mora',
            'telefono' => '2481-0098',
            'direccion' => 'pendiente',
            'transportista_id' => 1,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Super La Economía',
            'propietario' => 'Super la Economía',
            'telefono' => '8878-3088',
            'direccion' => 'La Tigra',
            'transportista_id' => 1,
            'clienteCuero_id' => 3
	        ],
	        [
            'nombre' => 'El Lomito',
            'propietario' => 'Ronald Hidalgo',
            'telefono' => '2479-9175',
            'direccion' => 'pendiente',
            'transportista_id' => 1,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnes Buen Trato',
            'propietario' => 'Carnes Buen Trato',
            'telefono' => 'Sin número',
            'direccion' => 'Los Ángeles',
            'transportista_id' => 1,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Super Cristian #4',
            'propietario' => 'Cadena Super Cristian',
            'telefono' => '2479-7685',
            'direccion' => 'Fortuna',
            'transportista_id' => 1,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'Super Cristian #2',
            'propietario' => 'Cadena Super Cristian',
            'telefono' => '2479-9885',
            'direccion' => 'La Tigra',
            'transportista_id' => 1,
            'clienteCuero_id' => NULL
	        ],
	        [
            'nombre' => 'Carnes Borbón',
            'propietario' => 'Carnes Borbón',
            'telefono' => '6315-2239',
            'direccion' => 'La Palmera',
            'transportista_id' => 1,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'Super Rosvil',
            'propietario' => 'Norman',
            'telefono' => '2479-7676',
            'direccion' => 'Fortuna',
            'transportista_id' => 1,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'Tamalera',
            'propietario' => 'Tamalera',
            'telefono' => 'Sin números',
            'direccion' => 'La Aquilea',
            'transportista_id' => 1,
            'clienteCuero_id' => NULL
	        ],
	        //Transportista Damaris Nuñez
	        [
            'nombre' => 'La Petite',
            'propietario' => 'Damaris Núnez',
            'telefono' => '2460-0154',
            'direccion' => 'Ciudad Quesada',
            'transportista_id' => 2,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnicería La Finca',
            'propietario' => 'Carnicería La Finca',
            'telefono' => '2460-8424',
            'direccion' => 'Ciudad Quesada',
            'transportista_id' => 2,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'La Moderna',
            'propietario' => 'Milton Gamboa Alfaro',
            'telefono' => '2460-0344',
            'direccion' => 'Ciudad Quesada',
            'transportista_id' => 2,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'La Central',
            'propietario' => 'Gonvilla S.A',
            'telefono' => '2460-1573',
            'direccion' => 'Ciudad Quesada',
            'transportista_id' => 2,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnes Greivin Porras',
            'propietario' => 'Greivin Porras',
            'telefono' => 'Sin número',
            'direccion' => 'Cedral',
            'transportista_id' => 2,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnes Rolo',
            'propietario' => 'Carnes Rolo',
            'telefono' => '2475-5150',
            'direccion' => 'Florencia',
            'transportista_id' => 2,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'Carnes Don Marvin',
            'propietario' => 'Dilana Quesada',
            'telefono' => '8951-1105',
            'direccion' => 'pendiente',
            'transportista_id' => 2,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnes Don Vicente',
            'propietario' => 'Tronco',
            'telefono' => '2460-1249',
            'direccion' => 'Ciudad Quesada',
            'transportista_id' => 2,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnes Hannia Quesada',
            'propietario' => 'Hannia Quesada',
            'telefono' => 'Sin número',
            'direccion' => 'Fortuna',
            'transportista_id' => 2,
            'clienteCuero_id' => 1
	        ],
	        //Transportista Alenxander Parrales
	        [
            'nombre' => 'Carnicería La guaria',
            'propietario' => 'Luis Fdo Solís Sauma',
            'telefono' => '2460-6544',
            'direccion' => 'Ciudad Quesada',
            'transportista_id' => 3,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnes San Antonio',
            'propietario' => 'Carlos Solís (Chema)',
            'telefono' => '2460-0793',
            'direccion' => 'Pendiente',
            'transportista_id' => 3,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'El Novillo',
            'propietario' => 'Eliomar Quesada',
            'telefono' => '2460-2369',
            'direccion' => 'Pendiente',
            'transportista_id' => 3,
            'clienteCuero_id' => 3
	        ],
	        [
            'nombre' => 'Carnicería Carnes Cuca',
            'propietario' => 'Jesus Vargas (Cuca)',
            'telefono' => '2460-3807',
            'direccion' => 'Ciudad Quesada',
            'transportista_id' => 3,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'Carnes Pino',
            'propietario' => 'Orlando Quesada (Pino)',
            'telefono' => '2460-1125',
            'direccion' => 'San Martín',
            'transportista_id' => 3,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'Carnes Don Alfredo',
            'propietario' => 'Carnes Don Alfredo',
            'telefono' => '2461-0773',
            'direccion' => 'San Roque',
            'transportista_id' => 3,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnes Lorena',
            'propietario' => 'Sergio Alfaro',
            'telefono' => '2460-3807',
            'direccion' => 'Ciudad Quesada',
            'transportista_id' => 3,
            'clienteCuero_id' => 3
	        ],
	        [
            'nombre' => 'Carnicería Bendición de Dios',
            'propietario' => 'Josue Calvo',
            'telefono' => '2460-2113',
            'direccion' => 'San Antonio',
            'transportista_id' => 3,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'Flosanco Florencia',
            'propietario' => 'Geovanny',
            'telefono' => '2475-5152',
            'direccion' => 'Florencia',
            'transportista_id' => 3,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Flosanco Santa Clara',
            'propietario' => 'Oscar',
            'telefono' => '2475-8383',
            'direccion' => 'Santa Clara',
            'transportista_id' => 3,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnicería Santa Clara',
            'propietario' => 'Jhonny Murillo',
            'telefono' => '2475-6595',
            'direccion' => 'Santa Clara',
            'transportista_id' => 3,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'Carnes Puro Verde',
            'propietario' => 'Carnes Puro Verde',
            'telefono' => '8730-6371',
            'direccion' => 'Muelle',
            'transportista_id' => 3,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Carnes Silvia Venegas',
            'propietario' => 'Carnes Silvia Venegas',
            'telefono' => '2474-3911',
            'direccion' => 'Aguas Zarcas',
            'transportista_id' => 3,
            'clienteCuero_id' => 2
	        ],
	        [
            'nombre' => 'Distribuidora Agua Zarcas',
            'propietario' => 'Juan Daniel (Cerdos)',
            'telefono' => '2474-3911',
            'direccion' => 'Aguas Zarcas',
            'transportista_id' => 3,
            'clienteCuero_id' => NULL
	        ],
	        [
            'nombre' => 'Carnicería El Rodeo',
            'propietario' => 'Carnicería El Rodeo',
            'telefono' => 'Sin número',
            'direccion' => 'Aguas Zarcas',
            'transportista_id' => 3,
            'clienteCuero_id' => NULL
	        ],
	        [
            'nombre' => 'Carnicería Platanar',
            'propietario' => 'Shirley Gónzales',
            'telefono' => '8739-8909',
            'direccion' => 'Platanar',
            'transportista_id' => 3,
            'clienteCuero_id' => 3
	        ],
	        [
            'nombre' => 'La Posta',
            'propietario' => 'Roy Ramírez Quesda',
            'telefono' => '8866-5457',
            'direccion' => '',
            'transportista_id' => 3,
            'clienteCuero_id' => NULL
	        ],
	        //Transportistas Personales
	        //Eladio Ramírez
	        [
            'nombre' => 'Carnicería EL Carmen',
            'propietario' => 'Eladio Ramírez',
            'telefono' => '2460-5758',
            'direccion' => 'pendiente',
            'transportista_id' => 4,
            'clienteCuero_id' => 1
	        ],
	        [
            'nombre' => 'Super Su Casa',
            'propietario' => 'Super Su Casa',
            'telefono' => '2462-1093',
            'direccion' => 'Santa Rosa',
            'transportista_id' => 5,
            'clienteCuero_id' => 1
	        ],
	        //marvin Leitón
	        [
            'nombre' => 'Colegio Agropecuario',
            'propietario' => 'Colegio Agropecuario',
            'telefono' => '8998-5070',
            'direccion' => 'Santa Rosa',
            'transportista_id' => 6,
            'clienteCuero_id' => NULL
	        ],
	        [
            'nombre' => 'Carnicas Carranza',
            'propietario' => 'Corporación KAISA',
            'telefono' => '2479-7404',
            'direccion' => 'pendiente',
            'transportista_id' => 7,
            'clienteCuero_id' => 2
	        ]
        ]);
    }
}
