<?php

namespace App\Services;


use App\Contracts\IElementoRepository;
use App\Models\Elemento;

class ElementoRepository extends BaseRepository implements IElementoRepository{

    public function getModel(){
        return new Elemento;
    }



}
