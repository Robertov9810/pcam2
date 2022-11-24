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
    $Gerencia->tipoproceso_id = '1';
    $Gerencia->save();

    $Gerencia1 = new Gerencia();
    $Gerencia1->nombre = 'Gerencia Regional de Transmisión Noroeste';
    $Gerencia1->siglas = 'NO';
    $Gerencia1->acronimo = 'GRTNO';
    $Gerencia1->tipoproceso_id = '2';
    $Gerencia1->save();

    $Gerencia2 = new Gerencia();
    $Gerencia2->nombre = 'Gerencia Regional de Transmisión Norte';
    $Gerencia2->siglas = 'NT';
    $Gerencia2->acronimo = 'GRTNT';
    $Gerencia2->tipoproceso_id = '3';
    $Gerencia2->save();

    $Gerencia3 = new Gerencia();
    $Gerencia3->nombre = 'Gerencia Regional de Transmisión Noreste';
    $Gerencia3->siglas = 'NE';
    $Gerencia3->acronimo = 'GRTNE';
    $Gerencia3->tipoproceso_id = '2';
    $Gerencia3->save();

    $Gerencia4 = new Gerencia();
    $Gerencia4->nombre = 'Gerencia Regional de Transmisión Occidente';
    $Gerencia4->siglas = 'OC';
    $Gerencia4->acronimo = 'GRTOC';
    $Gerencia4->tipoproceso_id = '1';
    $Gerencia4->save();

    $Gerencia5 = new Gerencia();
    $Gerencia5->nombre = 'Gerencia Regional de Transmisión Central';
    $Gerencia5->siglas = 'CE';
    $Gerencia5->acronimo = 'GRTCE';
    $Gerencia5->tipoproceso_id = '3';
    $Gerencia5->save();

    $Gerencia6 = new Gerencia();
    $Gerencia6->nombre = 'Gerencia Regional de Transmisión Valle de Mexico';
    $Gerencia6->siglas = 'VM';
    $Gerencia6->acronimo = 'GRTVM';
    $Gerencia6->tipoproceso_id = '2';
    $Gerencia6->save();

    $Gerencia7 = new Gerencia();
    $Gerencia7->nombre = 'Gerencia Regional de Transmisión Oriente';
    $Gerencia7->siglas = 'OR';
    $Gerencia7->acronimo = 'GRTOR';
    $Gerencia7->tipoproceso_id = '1';
    $Gerencia7->save();

    $Gerencia8 = new Gerencia();
    $Gerencia8->nombre = 'Gerencia Regional de Transmisión Sureste';
    $Gerencia8->siglas = 'SE';
    $Gerencia8->acronimo = 'GRTSE';
    $Gerencia8->tipoproceso_id = '3';
    $Gerencia8->save();

    $Gerencia9 = new Gerencia();
    $Gerencia9->nombre = 'Gerencia Regional de Transmisión Peninsular';
    $Gerencia9->siglas = 'PE';
    $Gerencia9->acronimo = 'GRTPE';
    $Gerencia9->tipoproceso_id = '1';
    $Gerencia9->save();


    }
}
