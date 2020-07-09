<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elemento = DB::table('elementos')->select('id')->where(['codigo'=>'comp_e_inv'])->first();


        DB::table('lineamientos')->insert([
            'nombre' => 'Principios',
            'codigo' => 'principios',
            'elemento_id' => $elemento->id
        ]);


        $elemento = DB::table('elementos')->select('id')->where(['codigo'=>'pol_seg_sal_ocup'])->first();

        DB::table('lineamientos')->insert([
            'nombre' => 'Política',
            'codigo' => 'politica',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Dirección',
            'codigo' => 'direccion',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Liderazgo',
            'codigo' => 'liderazgo',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Organización',
            'codigo' => 'organizacion',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Competencia',
            'codigo' => 'competencia',
            'elemento_id' => $elemento->id
        ]);
    }
}
