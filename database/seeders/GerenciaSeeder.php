<?php

namespace Database\Seeders;

use App\Models\Gerencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GerenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $Gerencia = new Gerencia();
    $Gerencia->nombre = 'Gerencia Regional de Transmisión Baja California';
    $Gerencia->siglas = 'BC';
    $Gerencia->acronimo = 'GRTBC';
    $Gerencia->tipoproceso_id = '9';
    $Gerencia->save();

    $Gerencia1 = new Gerencia();
    $Gerencia1->nombre = 'Gerencia Regional de Transmisión Occidente';
    $Gerencia1->siglas = 'OC';
    $Gerencia1->acronimo = 'GRTOC';
    $Gerencia1->tipoproceso_id = '10';
    $Gerencia1->save();

    $Gerencia2 = new Gerencia();
    $Gerencia2->nombre = 'Gerencia Regional de Transmisión Norte';
    $Gerencia2->siglas = 'NO';
    $Gerencia2->acronimo = 'GRTNO';
    $Gerencia2->tipoproceso_id = '11';
    $Gerencia2->save();

    $Gerencia3 = new Gerencia();
    $Gerencia3->nombre = 'Gerencia Regional de Transmisión Noreste';
    $Gerencia3->siglas = 'NE';
    $Gerencia3->acronimo = 'GRTNE';
    $Gerencia3->tipoproceso_id = '9';
    $Gerencia3->save();

    }
}
