<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->truncateTables([
            'tipos',
            'elementos',
            'lineamientos',
            'preguntas',
            'estimaciones'
        ]);

        $this->call(TipoSeeder::class);
        $this->call(ElementoSeeder::class);
        $this->call(LineamientoSeeder::class);
        $this->call(PreguntaSeeder::class);
        $this->call(EstimacionSeeder::class);
    }



    //desabilita las llaves foraneas
    protected function truncateTables(array $tables){

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }
}
