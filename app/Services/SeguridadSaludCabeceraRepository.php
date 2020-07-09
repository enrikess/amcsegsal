<?php

namespace App\Services;

use App\Contracts\IElementoRepository;
use App\Contracts\ISeguridadSaludCabeceraRepository;
use App\Models\Elemento;
use App\Models\SeguridadSaludCabecera;
use App\Models\SeguridadSaludRespuesta;
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
        // 1 modulo de tipo seguridad y salud
        $data["tipo_id"] = 1;

        $cabecera = SeguridadSaludCabecera::create($data);

        $cabecera->SeguridadSaludRespuestas()->saveMany($data["seguridadSaludRespuestas"]);

        $this->calcularResultados($cabecera->id);

        $calificacion = $this->calcularCalificacion($cabecera->id);

        $cabecera->calificacion = $calificacion;

        $cabecera->save();

        return $cabecera;

    }

    public function calcularCalificacion(int $idCabecera){

        $aplica = SeguridadSaludRespuesta::
                        where('seguridad_salud_cabecera_id','=',$idCabecera)
                        ->where('aplica','=','1')->count();

        $cumple = SeguridadSaludRespuesta::
                        where('seguridad_salud_cabecera_id','=',$idCabecera)
                        ->where('aplica','=','1')
                        ->where('cumple','=','1')
                        ->count();

        $calificacion = ($cumple/$aplica) * 100;
        return $calificacion;
    }

    public function calcularResultados(int $idCabecera){
        $elementos = Elemento::from('elementos as el')->select('el.id as elemento',DB::raw('count(aplica) as cantidad'))
                        ->join('lineamientos as li','el.id','=','li.elemento_id')
                        ->join('preguntas as pre','li.id','=','pre.lineamiento_id')
                        ->join('seguridad_salud_respuestas as resp','pre.id','=','resp.pregunta_id')
                        ->join('seguridad_salud_cabeceras as cab','resp.seguridad_salud_cabecera_id','=','cab.id')
                        ->where('el.tipo_id','=','1')
                        ->where('cab.id','=',$idCabecera)
                        ->groupBy('el.id')
                        ->get();
        foreach ($elementos as $key => $value) {
            dd($value);
        }




        $resultados = [];
        var_dump($elementos);
        return;
        foreach ($elementos as $elemento) {

        }

    }



}
