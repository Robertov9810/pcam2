<?php

namespace Database\Seeders;

use App\Models\Tipoproceso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoprocesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
    $Tipoproceso = new Tipoproceso();
    $Tipoproceso->proceso = 'Generación';
    $Tipoproceso->save();

    $Tipoproceso1 = new Tipoproceso();
    $Tipoproceso1->proceso = 'Tranmisión';
    $Tipoproceso1->save();

    $Tipoproceso2 = new Tipoproceso();
    $Tipoproceso2->proceso = 'Distribución';
    $Tipoproceso2->save();
}
}