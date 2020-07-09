<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lineamiento extends Model
{
    protected $table = 'lineamientos';

/******************************************************/
    //many to one
        //varios lineamientos un Elemento
    public function elemento()
    {
        return $this->belongsTo('App\Models\Elemento');
    }


/******************************************************/
    //one to many
        //Un lineamiento varias preguntas
    public function preguntas()
    {
        return $this->hasMany('App\Models\Pregunta');
    }
}
