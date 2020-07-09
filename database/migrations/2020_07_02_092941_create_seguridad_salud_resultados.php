<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguridadSaludResultados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguridad_salud_resultados', function (Blueprint $table) {
            $table->boolean('aplica');
            $table->boolean('cumple');
            $table->foreignId('lineamiento_id')->constrained()->onDelete('cascade');
            $table->foreignId('seguridad_salud_cabecera_id')->constrained('seguridad_salud_cabeceras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguridad_salud_resultados');
    }
}
