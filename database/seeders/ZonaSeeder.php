<?php

namespace Database\Seeders;

use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $Zona = new Zona();
    $Zona->nombre = 'Distribución Acapulco';
    $Zona->siglas = 'DTACA';
    $Zona->descripcion = 'Zona Acapulco';
    $Zona->gerencia_id = '1';
    $Zona->save();

    $Zona1 = new Zona();
    $Zona1->nombre = 'Distribución Altamirano';
    $Zona1->siglas = 'DTALT';
    $Zona1->descripcion = 'Zona Altamirano';
    $Zona1->gerencia_id = '4';
    $Zona1->save();

    $Zona2 = new Zona();
    $Zona2->nombre = 'Distribución Chilpancingo';
    $Zona2->siglas = 'DTCHI';
    $Zona2->descripcion = 'Zona Chilpancingo';
    $Zona2->gerencia_id = '5';
    $Zona2->save();

    $Zona3 = new Zona();
    $Zona3->nombre = 'Distribución Cuautla';
    $Zona3->siglas = 'DTACUA';
    $Zona3->descripcion = 'Zona Cuautla';
    $Zona3->gerencia_id = '6';
    $Zona3->save();

    $Zona4 = new Zona();
    $Zona4->nombre = 'Distribución Cuernavaca';
    $Zona4->siglas = 'DTACUE';
    $Zona4->descripcion = 'Zona Cuernavaca';
    $Zona4->gerencia_id = '3';
    $Zona4->save();

    $Zona5 = new Zona();
    $Zona5->nombre = 'Distribución Iguala';
    $Zona5->siglas = 'DTAIGU';
    $Zona5->descripcion = 'Zona Iguala';
    $Zona5->gerencia_id = '3';
    $Zona5->save();

    $Zona6 = new Zona();
    $Zona6->nombre = 'Distribución Morelos';
    $Zona6->siglas = 'DTAMOR';
    $Zona6->descripcion = 'Zona Morelos';
    $Zona6->gerencia_id = '3';
    $Zona6->save();

    $Zona7 = new Zona();
    $Zona7->nombre = 'Distribución Zihuatanejo';
    $Zona7->siglas = 'DTAZIH';
    $Zona7->descripcion = 'Zona Zihuatanejo';
    $Zona7->gerencia_id = '3';
    $Zona7->save();

    $Zona8 = new Zona();
    $Zona8->nombre = 'Produccion Central';
    $Zona8->siglas = 'PROCEN';
    $Zona8->descripcion = 'Zona Produccion Central';
    $Zona8->gerencia_id = '3';
    $Zona8->save();

    $Zona9 = new Zona();
    $Zona9->nombre = 'Transmision Guerrero';
    $Zona9->siglas = 'TRANGUE';
    $Zona9->descripcion = 'Zona Transmision Guerrero';
    $Zona9->gerencia_id = '3';
    $Zona9->save();

    $Zona10 = new Zona();
    $Zona10->nombre = 'Transmision Sur';
    $Zona10->siglas = 'TRANSUR';
    $Zona10->descripcion = 'Zona Transmision Sur';
    $Zona10->gerencia_id = '3';
    $Zona10->save();
    }
}
