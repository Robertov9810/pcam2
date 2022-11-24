<?php

namespace Database\Seeders;

use App\Models\Estadopunto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoPuntoSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $Estadopunto = new Estadopunto();
    $Estadopunto->nom = 'Validado';
    $Estadopunto->save();

    $Estadopunto1 = new Estadopunto();
    $Estadopunto1->nom = 'Validado Campo';
    $Estadopunto1->save();

    $Estadopunto2 = new Estadopunto();
    $Estadopunto2->nom = 'Pendiente';
    $Estadopunto2->save();
    }
}
