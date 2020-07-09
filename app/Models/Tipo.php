<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';

/******************************************************/
    //Un tipo varios elementos
    public function elementos()
    {
        return $this->hasMany('App\Models\Elemento');
    }

}
