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

        DB::table('elementos')->insert([
            'nombre' => 'IMPLEMENTACIÓN Y OPERACIÓN',
            'codigo' => 'impl_oper',
            'tipo_id' => $tipo->id
        ]);

        DB::table('elementos')->insert([
            'nombre' => 'EVALUACIÓN NORMATIVA',
            'codigo' => 'eval_norm',
            'tipo_id' => $tipo->id
        ]);

        DB::table('elementos')->insert([
            'nombre' => 'VERIFICACIÓN',
            'codigo' => 'verif',
            'tipo_id' => $tipo->id
        ]);

        DB::table('elementos')->insert([
            'nombre' => 'CONTROL DE INFORMACIÓN Y DOCUMENTOS',
            'codigo' => 'ctrl_inf_doc',
            'tipo_id' => $tipo->id
        ]);

        DB::table('elementos')->insert([
            'nombre' => 'REVISIÓN POR LA DIRECCIÓN',
            'codigo' => 'rev_x_direc',
            'tipo_id' => $tipo->id
        ]);
    }
}
