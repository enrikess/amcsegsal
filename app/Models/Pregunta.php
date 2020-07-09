<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';

/******************************************************/
    //many to one
        //varias preguntas un lineamiento
        public function lineamiento()
        {
            return $this->belongsTo('App\Models\Lineamiento');
        }


/******************************************************/
    //one to many
        //Un SeguridadSaludCabecera varios seguridadSaludRespuesta
    public function seguridadSaludRespuestas()
    {
        return $this->hasMany('App\Models\SeguridadSaludRespuesta');
    }
}
