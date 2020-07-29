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


        $elemento = DB::table('elementos')->select('id')->where(['codigo'=>'plan_aplic'])->first();

        DB::table('lineamientos')->insert([
            'nombre' => 'Diagnóstico',
            'codigo' => 'diagnostico',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Planeamiento para la Identificación de Peligros, Evalaución y Control de Riesgos',
            'codigo' => 'plan_para_ident',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Objetivos',
            'codigo' => 'objetivos',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Programa de seguridad y salud en el trabajo',
            'codigo' => 'prog_seg_sal_trab',
            'elemento_id' => $elemento->id
        ]);


        $elemento = DB::table('elementos')->select('id')->where(['codigo'=>'impl_oper'])->first();

        DB::table('lineamientos')->insert([
            'nombre' => 'Estructura y responsabilidades',
            'codigo' => 'estr_resp',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Capacitación',
            'codigo' => 'capacitacion',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Medidas de prevención',
            'codigo' => 'med_prev',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Preparación y respuestas ante emergencias',
            'codigo' => 'prep_resp_emerg',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Contratistas, Subcontratistas, empresa, entidad pública o privada, de servicios y cooperativas',
            'codigo' => 'contratistas',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Consulta y comunicación',
            'codigo' => 'cons_com',
            'elemento_id' => $elemento->id
        ]);


        $elemento = DB::table('elementos')->select('id')->where(['codigo'=>'eval_norm'])->first();

        DB::table('lineamientos')->insert([
            'nombre' => 'Requisitos legales y de otro tipo',
            'codigo' => 'req_leg',
            'elemento_id' => $elemento->id
        ]);


        $elemento = DB::table('elementos')->select('id')->where(['codigo'=>'verif'])->first();

        DB::table('lineamientos')->insert([
            'nombre' => 'Supervisión, monitoreo y seguimiento de desempeño',
            'codigo' => 'super_mon_seg',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Salud en el trabajo',
            'codigo' => 'sal_trab',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Accidentes, incidentes peligrosos e incidentes, no conformidad, acción correctiva y preventiva',
            'codigo' => 'acc_inc',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Investigación de accidentes y enfermedades ocupacionales',
            'codigo' => 'inv_acc_enf',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Control de las  operaciones',
            'codigo' => 'ctrl_op',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Gestión del cambio',
            'codigo' => 'gest_camb',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Auditorias',
            'codigo' => 'auditorias',
            'elemento_id' => $elemento->id
        ]);


        $elemento = DB::table('elementos')->select('id')->where(['codigo'=>'ctrl_inf_doc'])->first();

        DB::table('lineamientos')->insert([
            'nombre' => 'Documentos',
            'codigo' => 'documentos',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Control de la documentación y de los datos',
            'codigo' => 'ctrl_doc_dat',
            'elemento_id' => $elemento->id
        ]);

        DB::table('lineamientos')->insert([
            'nombre' => 'Gestión de los registros',
            'codigo' => 'gest_reg',
            'elemento_id' => $elemento->id
        ]);


        $elemento = DB::table('elementos')->select('id')->where(['codigo'=>'rev_x_direc'])->first();

        DB::table('lineamientos')->insert([
            'nombre' => 'Gestión de la mejora continua',
            'codigo' => 'gest_mej_cont',
            'elemento_id' => $elemento->id
        ]);



    }
}
