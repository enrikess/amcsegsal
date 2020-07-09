<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lineamiento = DB::table('lineamientos')->select('id')->where(['codigo'=>'principios'])->first();


        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador proporciona los recursos necesarios para que se implemente un sistema de gestión de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se ha cumplido lo planificado en los diferentes programas de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se implementan acciones preventivas de seguridad y salud en el trabajo para asegurar la mejora continua.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['codigo'=>'politica'])->first();


        DB::table('preguntas')->insert([
            'descripcion' => 'Existe una política documentada en materia de seguridad y salud en el trabajo, específica y apropiada para la empresa, entidad pública o privada.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La política de seguridad y salud en el trabajo está firmada por la máxima autoridad de la empresa, entidad pública o privada.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los trabajadores conocen y están comprometidos con lo establecido en la política de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);


        $lineamiento = DB::table('lineamientos')->select('id')->where(['codigo'=>'direccion'])->first();


        DB::table('preguntas')->insert([
            'descripcion' => 'Se toman decisiones en base al análisis de inspecciones, auditorias, informes de investigación de accidentes, informe de estadísticas,  avances de programas de seguridad y salud en el trabajo y opiniones de trabajadores, dando el seguimiento de las mismas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador delega funciones y autoridad al personal encargado de implementar el sistema de gestión de Seguridad y Salud en el Trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);


    }
}
