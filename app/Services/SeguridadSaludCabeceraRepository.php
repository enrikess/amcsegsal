<?php

namespace App\Services;

use App\Contracts\IElementoRepository;
use App\Contracts\ISeguridadSaludCabeceraRepository;
use App\Models\Elemento;
use App\Models\SeguridadSaludCabecera;
use App\Models\SeguridadSaludRespuesta;
use App\Models\SeguridadSaludResultado;
use Illuminate\Support\Facades\DB;

class SeguridadSaludCabeceraRepository extends BaseRepository implements ISeguridadSaludCabeceraRepository{

    protected $ElementoRepository;

    public function __construct(IElementoRepository $ElementoRepo)
    {
        $this->ElementoRepository = $ElementoRepo;
    }

    public function getModel(){
        return new SeguridadSaludCabecera();
    }

    public function crearCompleto(array $data){


        //Guarda Cabecera
        $cabecera = SeguridadSaludCabecera::create($data);

        // 1 modulo de tipo seguridad y salud
        $cabecera->tipo_id = 1;

        //Guarda Respuestas
        $cabecera->SeguridadSaludRespuestas()->saveMany($data["seguridadSaludRespuestas"]);

        //Calcula calificacion de la cabecera
        $calificacion = $this->calcularCalificacion($cabecera->id);

        //Agregra calificacion a la cabecera
        $cabecera->calificacion = $calificacion;

        //Actualiza calificacion
        $cabecera->save();


        //Calcular Resultados
        $resultados = $this->calcularResultados($cabecera->id);

        //agregar al array de la data
        $data["seguridadSaludResultados"] = $resultados;

        //guardar resultados
        $cabecera->SeguridadSaludResultados()->createMany($data["seguridadSaludResultados"]);


        return $cabecera;

    }

    public function calcularCalificacion(int $idCabecera){

        //calcular las respuestas que aplican
        $aplica = SeguridadSaludRespuesta::
                        where('seguridad_salud_cabecera_id','=',$idCabecera)
                        ->where('aplica','=','1')->count();

        //calcular las respuestas que comple
        $cumple = SeguridadSaludRespuesta::
                        where('seguridad_salud_cabecera_id','=',$idCabecera)
                        ->where('aplica','=','1')
                        ->where('cumple','=','1')
                        ->count();

        $calificacion = ($cumple/$aplica) * 100;
        return $calificacion;
    }

    public function calcularResultados(int $idCabecera){

        //contar todas las preguntas que aplican y los que cumplen
        $elementos = SeguridadSaludResultado::
        from('elementos as el')->select('el.id as elemento_id',DB::raw('count(aplica) as aplica'),DB::raw('sum(cumple) as cumple'))
                        ->join('lineamientos as li','el.id','=','li.elemento_id')
                        ->join('preguntas as pre','li.id','=','pre.lineamiento_id')
                        ->join('seguridad_salud_respuestas as resp','pre.id','=','resp.pregunta_id')
                        ->join('seguridad_salud_cabeceras as cab','resp.seguridad_salud_cabecera_id','=','cab.id')
                        ->where('el.tipo_id','=','1')
                        ->where('cab.id','=',$idCabecera)
                        ->groupBy('el.id')
                        ->get();

        //retornarlos en formato array
        return $elementos->toArray();
    }



}
