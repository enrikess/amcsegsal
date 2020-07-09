<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table = 'elementos';
/******************************************************/
    //many to one
        //varios elementos un tipo
    public function tipo()
    {
        return $this->belongsTo('App\Models\Tipo');
    }

/******************************************************/
    //one to many
        //Un elemento varios lineamientos
    public function lineamientos()
    {
        return $this->hasMany('App\Models\Lineamiento');
    }
}
