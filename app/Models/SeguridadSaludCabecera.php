<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguridadSaludCabecera extends Model
{
    protected $table = 'seguridad_salud_cabeceras';

    protected $fillable = ['descripcion','fecha','calificacion'];

    //protected $dates = [
    //    'fecha'
    //];
    //protected $dateFormat = 'Y-m-d';
    protected $casts  = [
        'fecha' => 'date_format:Y-m-d',
        'created_at' => 'date_format:Y-m-d H:00',
        'update_at' => 'date_format:Y-m-d H:00',
    ];
/**********************************************/
    //many to one
        //varios SeguridadSaludCabecera un tipo
    public function tipo()
    {
        return $this->belongsTo('App\Models\Tipo');
    }



/******************************************************/
    //one to many
        //Un SeguridadSaludCabecera varios seguridadSaludRespuesta
    public function seguridadSaludRespuestas()
    {
        return $this->hasMany('App\Models\SeguridadSaludRespuesta');
    }

    //Un SeguridadSaludCabecera varios seguridadSaludResultado
    public function seguridadSaludResultados()
    {
        return $this->hasMany('App\Models\SeguridadSaludResultado');
    }

}
