<?php

namespace App\Services;

use App\Contracts\IElementoRepository;
use App\Contracts\IEstimacionRepository;
use App\Contracts\ISeguridadSaludCabeceraRepository;
use App\Models\Elemento;
use App\Models\SeguridadSaludCabecera;
use App\Models\SeguridadSaludRespuesta;
use App\Models\SeguridadSaludResultado;
use App\Models\Tipo;
use Illuminate\Support\Facades\DB;

class SeguridadSaludCabeceraRepository extends BaseRepository implements ISeguridadSaludCabeceraRepository{

    protected $ElementoRepository;
    protected $EstimacionRepository;

    public function __construct(IElementoRepository $ElementoRepo,
                                IEstimacionRepository $EstimacionRepo)
    {
        $this->ElementoRepository = $ElementoRepo;
        $this->EstimacionRepository = $EstimacionRepo;
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


    public function ActualizarCompleto(array $data){
        $cabecera = $this->find($data["id"]);
        $cabecera = $this->update($cabecera,$data);
        //guardar respuestas en una variable
        $respuestas = $data["seguridadSaludRespuestas"];

        //Borrar respuestas de esa tabla
        $cabecera->SeguridadSaludRespuestas()->delete();

        //Guardar respuesta por respuesta en la tabla
        foreach ($data["seguridadSaludRespuestas"] as $resp) {
            $respuesta = new SeguridadSaludRespuesta();
            $respuesta->aplica = $resp->aplica;
            $respuesta->cumple = $resp->cumple;
            $respuesta->fuente = $resp->fuente;
            $respuesta->observacion = $resp->observacion;
            $respuesta->pregunta_id = $resp->pregunta_id;
            $respuesta->seguridad_salud_cabecera_id = $resp->seguridad_salud_cabecera_id;
            $cabecera->SeguridadSaludRespuestas()->save($respuesta);
        }

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

        //Borrar resultados de esa tabla
        $cabecera->SeguridadSaludResultados()->delete();

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
        from('elementos as el')->select('el.id as elemento_id',DB::raw('count(aplica) as aplica'),DB::raw('IFNULL(sum(cumple),0) as cumple'))
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

    public function TodasCabecerasConEstimaciones(){

        //traer todas las cabeceras
        $cabeceras = $this->getAll();

        //traer todas las estimaciones
        $estimaciones = $this->EstimacionRepository->getAll();

        //recorrer cabeceras
        foreach ($cabeceras as $cabecera) {
            //recorrer estimaciones
            foreach ($estimaciones as $estimacion) {

                //validar si se encuentra en el rango
                if ($cabecera->calificacion >= $estimacion->min && $cabecera->calificacion <= $estimacion->max) {
                    //agregar attributo estimaciones
                    $cabecera["estimacion"] = $estimacion;
                }
            }
        }
        return $cabeceras;
    }

    public function TraerCabeceraRespuestas($id){
        return SeguridadSaludCabecera::with('seguridadSaludRespuestas')->where('id','=',$id)->first();
    }

    public function tablaCompleta($id){
        $preguntas = DB::table('tipos as ti')
                        ->select(  DB::raw('	el.id AS elemento_id,
                                                el.nombre AS elemento,
                                                li.id AS lineamiento_id,
                                                li.nombre AS lineamiento,
                                                pre.descripcion AS pregunta,
                                                pre.id AS pregunta_id,
                                                res.aplica AS aplica,
                                                res.cumple AS cumple,
                                                res.fuente AS fuente,
                                                res.observacion AS observacion'
                                    ))
                        ->Join('elementos as el','ti.id','=','el.tipo_id')
                        ->Join('lineamientos as li','el.id','=','li.elemento_id')
                        ->join('preguntas as pre','li.id','=','pre.lineamiento_id')
                        ->join('seguridad_salud_respuestas as res','res.pregunta_id','=','pre.id')
                        ->where('res.seguridad_salud_cabecera_id','=',$id)
                        ->where('ti.id','=',1);


        $respuestas = DB::table('preguntas as pre')
                        ->select(  DB::raw(
                                            'el.id AS elemento_id,
                                            el.nombre AS elemento,
                                            li.nombre AS lineamiento,
                                            li.id AS lineamiento_id,
                                            pre.id AS pregunta_id,
                                            pre.descripcion AS pregunta,
                                            res.aplica AS aplica,
                                            res.`cumple` AS cumple,
                                            res.`fuente` AS fuente,
                                            res.`observacion` AS observacion'
                        ))
                        ->LeftJoinSub($preguntas,'res',function($join){
                                $join->on('pre.id','=','res.pregunta_id');
                        })
                        ->Join('lineamientos as li','li.id','=','pre.lineamiento_id')
                        ->Join('elementos as el','el.id','=','li.elemento_id')
                        ->get();


        return $respuestas;
    }


    public function tablaResultados($id){
        $resultados = DB::table('seguridad_salud_resultados as res')
                            ->select(  DB::raw( 'el.id as elemento_id,
                                        el.nombre as elemento,
                                        res.cumple as cumple,
                                        res.aplica as aplica'))
                            ->join('elementos as el','el.id','=','res.elemento_id')
                            ->where('res.seguridad_salud_cabecera_id','=',$id);

        $tabla = DB::table('elementos as el')
                        ->select(DB::raw('el.id as elemento_id,
                                    el.nombre as elemento,
                                    IFNULL(res.aplica,0) as aplica,
                                    IFNULL(res.cumple,0) as cumple,
                                    FORMAT(IFNULL((res.cumple/res.aplica)*100,0),2) AS porcentaje'))
                        ->LeftJoinSub($resultados,'res',function($join){
                            $join->on('res.elemento_id','=','el.id');
                        })
                        ->get();
        return $tabla;
    }

    public function grafico($id){
        $resultados = DB::table('seguridad_salud_resultados as res')
                    ->select(  DB::raw( 'el.id as elemento_id,
                                el.nombre as elemento,
                                res.cumple as cumple,
                                res.aplica as aplica'))
                    ->join('elementos as el','el.id','=','res.elemento_id')
                    ->where('res.seguridad_salud_cabecera_id','=',$id);

        $tabla = DB::table('elementos as el')
                        ->select(DB::raw('
                                    el.nombre as elemento,
                                    FORMAT(IFNULL((res.cumple/res.aplica)*100,0),2) AS porcentaje'))
                        ->LeftJoinSub($resultados,'res',function($join){
                            $join->on('res.elemento_id','=','el.id');
                        })
                        ->get();
        return $tabla;
    }
}
