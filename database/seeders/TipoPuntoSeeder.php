<?php

namespace Database\Seeders;

use App\Models\Tipopunto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $Tipopunto = new Tipopunto();
    $Tipopunto->tipo = 'Digital';
    $Tipopunto->save();

    $Tipopunto1 = new Tipopunto();
    $Tipopunto1->tipo = 'Analogico';
    $Tipopunto1->save();
    }
}
