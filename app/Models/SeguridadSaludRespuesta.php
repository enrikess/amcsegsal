<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguridadSaludRespuesta extends Model
{
    protected $table = 'seguridad_salud_respuestas';

    protected $fillable = ['aplica','cumple','fuente', 'observacion','pregunta_id','seguridad_salud_cabecera_id'];

/**********************************************/
    //many to one
        //varios SeguridadSaludRespuesta un SeguridadSaludCabecera
        public function SeguridadSaludCabecera()
        {
            return $this->belongsTo('App\Models\SeguridadSaludCabecera');
        }

        //varios SeguridadSaludRespuesta un pregunta
        public function pregunta()
        {
            return $this->belongsTo('App\Models\Pregunta');
        }
/**********************************************/

}
