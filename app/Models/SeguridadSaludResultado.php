<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguridadSaludResultado extends Model
{
    protected $table = 'seguridad_salud_resultados';

    protected $fillable = ['aplica','cumple','elemento_id','seguridad_salud_cabecera_id'];

/**********************************************/
    //many to one
        //varios SeguridadSaludRespuesta un SeguridadSaludCabecera
        public function SeguridadSaludCabecera()
        {
            return $this->belongsTo('App\Models\SeguridadSaludCabecera');
        }

    //many to one
        //varios lineamientos un Elemento
        public function elemento()
        {
            return $this->belongsTo('App\Models\Elemento');
        }

}
