<?php

namespace App\Services;


use App\Contracts\IEstimacionRepository;
use App\Models\Estimacion;

class EstimacionRepository extends BaseRepository implements IEstimacionRepository{

    public function getModel(){
        return new Estimacion;
    }



}
