<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstimacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('estimaciones')->insert([
            'nombre' => 'Pobre',
            'color' => 'danger',
            'descripcion' => 'La mayoría de elementos del SSST no son aplicados. Se necesita con urgencia mejorar los procedimientos y condiciones físicas del lugar.',
            'min' => '0',
            'max' => '30'
        ]);

        DB::table('estimaciones')->insert([
            'nombre' => 'Regular',
            'color' => 'warning',
            'descripcion' => 'Algunos elementos principales del sistema de seguridad no son aplicados. P.D. estructura orgánica formalizada y registros, medidas de la planificación e implementación, revisiones regulares del programa, involucramiento de los trabajadores. Las condiciones físicas en el lugar necesitan ser mejoradas para cumplir con los requisitos legales y normas de la empresa.',
            'min' => '31',
            'max' => '60'
        ]);

        DB::table('estimaciones')->insert([
            'nombre' => 'Buena',
            'color' => 'success',
            'descripcion' => 'La mayoría de elementos del SSST no son aplicados. Se necesita con urgencia mejorar los procedimientos y condiciones físicas del lugar.',
            'min' => '61',
            'max' => '100'
        ]);
    }
}
