<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tipoproceso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(TipoprocesoSeeder::class);//Llamando al seeder de Tipo Proceso

        $this->call(GerenciaSeeder::class);//Llamando al seeder de Gerencia

        $this->call(ZonaSeeder::class);//Llamando al seeder de Zona

        $this->call(EstadoPuntoSedder::class);//Llammada al seeder de estado punto

        $this->call(TipoPuntoSeeder::class);//Llammada al seeder de Tipo de punto

        $this->call(SubestacionSeeder::class);//Llammada al seeder SubestacionSeeder


        //\App\Models\User::factory(5)->create();
        //\App\Models\Gerencia::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
