<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = DB::table('tipos')->select('id')->first();



        DB::table('elementos')->insert([
            'nombre' => 'COMPROMISO E INVOLUCRAMIENTO',
            'codigo' => 'comp_e_inv',
            'tipo_id' => $tipo->id
        ]);

        DB::table('elementos')->insert([
            'nombre' => 'POLITICA DE SEGURIDAD Y SALUD OCUPACIONAL',
            'codigo' => 'pol_seg_sal_ocup',
            'tipo_id' => $tipo->id
        ]);

        DB::table('elementos')->insert([
            'nombre' => 'PLANEAMIENTO Y APLICACIÓN',
            'codigo' => 'plan_aplic',
            'tipo_id' => $tipo->id
        ]);
    }
}
