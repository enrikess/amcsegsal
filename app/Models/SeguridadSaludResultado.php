<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguridadSaludResultado extends Model
{
    protected $table = 'seguridad_salud_resultados';



/**********************************************/
    //many to one
        //varios SeguridadSaludRespuesta un SeguridadSaludCabecera
        public function SeguridadSaludCabecera()
        {
            return $this->belongsTo('App\Models\SeguridadSaludCabecera');
        }


}
