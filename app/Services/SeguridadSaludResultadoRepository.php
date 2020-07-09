<?php

namespace App\Services;

use App\Contracts\ISeguridadSaludResultadoRepository;
use App\Models\SeguridadSaludResultado;

class SeguridadSaludResultadoRepository extends BaseRepository implements ISeguridadSaludResultadoRepository{

    public function getModel(){
        return new SeguridadSaludResultado();
    }



}
