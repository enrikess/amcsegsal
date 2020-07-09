<?php

namespace App\Services;


use App\Contracts\ILineamientoRepository;
use App\Models\Lineamiento;
use App\Models\Pregunta;

class LineamientoRepository extends BaseRepository implements ILineamientoRepository{

    public function getModel(){
        return new Lineamiento();
    }

    public function buscarPorElemento($IdElemento){

        return Lineamiento::where('elemento_id', $IdElemento)->get();
    }

    public function traerPreguntas(){
        return Lineamiento::with('preguntas')->get();
    }



}
