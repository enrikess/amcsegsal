<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguridadSaludRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguridad_salud_respuestas', function (Blueprint $table) {
            $table->id();
            $table->boolean('aplica');
            $table->boolean('cumple')->nullable();
            $table->string('fuente')->nullable();
            $table->string('observacion')->nullable();
            $table->foreignId('pregunta_id')->constrained()->onDelete('cascade');
            $table->foreignId('seguridad_salud_cabecera_id')->constrained('seguridad_salud_cabeceras')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguridad_salud_respuestas');
    }
}
