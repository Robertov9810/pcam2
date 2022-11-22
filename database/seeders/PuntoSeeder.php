<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

Class PuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
            DB::table('puntos')->insert([
                'leyenda' => 'APC 72010 Bajo Nivel de SF6',
                'entity_name' => '02GMOAPC AL-72010 NIVEL SF6',
                'bin_in' => '1',
                'bin_out' => '0',
                'estatus' => '1',
                'comentario_id' => '1',
                'control_validado' => '1',
                'estadopunto_id' => '1',
                'subestacion_id' => '1',
                'tipopunto_id' => '2',	    
            ]);
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
            // ..

    }
}
