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
    $Zona->gerencia_id = '3';
    $Zona->save();

    $Zona1 = new Zona();
    $Zona1->nombre = 'Distribución Chilpancingo';
    $Zona1->siglas = 'DTCH';
    $Zona1->descripcion = 'Zona Chilpancingo';
    $Zona1->gerencia_id = '4';
    $Zona1->save();

    $Zona2 = new Zona();
    $Zona2->nombre = 'Distribución Altamirano';
    $Zona2->siglas = 'DTALT';
    $Zona2->descripcion = 'Zona Altamirano';
    $Zona2->gerencia_id = '5';
    $Zona2->save();

    $Zona3 = new Zona();
    $Zona3->nombre = 'Distribución Cuautla';
    $Zona3->siglas = 'DTACUA';
    $Zona3->descripcion = 'Zona Cuautla';
    $Zona3->gerencia_id = '6';
    $Zona3->save();

    $Zona4 = new Zona();
    $Zona4->nombre = 'Distribución Iguala';
    $Zona4->siglas = 'DTAIGUA';
    $Zona4->descripcion = 'Zona Iguala';
    $Zona4->gerencia_id = '3';
    $Zona4->save();
    }
}
