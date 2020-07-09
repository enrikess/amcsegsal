<?php

namespace App\Services;


use App\Contracts\ISeguridadSaludRespuestaRepository;
use App\Models\SeguridadSaludRespuesta;

class SeguridadSaludRespuestaRepository extends BaseRepository implements ISeguridadSaludRespuestaRepository{

    public function getModel(){
        return new SeguridadSaludRespuesta();
    }



}
