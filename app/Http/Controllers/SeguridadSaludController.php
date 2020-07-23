<?php

namespace App\Http\Controllers;

use App\Contracts\IElementoRepository;
use App\Contracts\ILineamientoRepository;
use App\Contracts\ISeguridadSaludCabeceraRepository;
use App\Contracts\ISeguridadSaludRespuestaRepository;
use App\Contracts\ISeguridadSaludResultadoRepository;
use App\Models\SeguridadSaludCabecera;
use App\Models\SeguridadSaludRespuesta;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;


class SeguridadSaludController extends Controller
{

    protected $ElementoRepository;
    protected $LineamientoRepository;
    protected $SegSalCabRepository;
    protected $SegSalRespRepository;
    protected $SegSalResulRepository;


    public function __construct(IElementoRepository $ElementoRepo,
                                ILineamientoRepository $LineamientoRepo,
                                ISeguridadSaludCabeceraRepository $SegSalCabRepo,
                                ISeguridadSaludRespuestaRepository $SegSalRespRepo,
                                ISeguridadSaludResultadoRepository $SegSalResulRepo)
    {

        $this->ElementoRepository = $ElementoRepo;
        $this->LineamientoRepository = $LineamientoRepo;
        $this->SegSalCabRepository = $SegSalCabRepo;
        $this->SegSalRespRepository = $SegSalRespRepo;
        $this->SegSalResulRepository = $SegSalResulRepo;
    }

    public function index()
    {

        $titulo = "Lista de Estudio de Linea Base";
        $cabeceras = $this->SegSalCabRepository->TodasCabecerasConEstimaciones();

        return view('segsal.index',compact('titulo','cabeceras'));

    }



    public function create()
    {
        $segsalcab = new SeguridadSaludCabecera();
        $segsalcab->fecha = Carbon::today()->toDateString();

        $lineamientos = $this->LineamientoRepository->traerPreguntas();
        $elementos = $this->ElementoRepository->getAll();
        $titulo = "Registro de Estudio de Linea Base";

        return view('segsal.form',compact('titulo','segsalcab','lineamientos','elementos'));
    }

    public function store(Request $request)
    {
        //Guardar la cabecera
        $cabecera = new SeguridadSaludCabecera();

        //dar formato a la fecha e creacion
        $cabecera->fecha = Carbon::createFromFormat('Y-m-d',$request->fecha);


        $cabecera->descripcion = $request->descripcion;

        //array donde se guardaran las respuestas
        $todasResp = [];

        //recorrer todas las preguntas
        foreach ($request->nroPregunta as $value) {

            $respuesta = new SeguridadSaludRespuesta();


            //validar existencia en el request
            if (isset($request->aplica[$value])) {
                $respuesta->pregunta_id = $value;
                $respuesta->aplica = $request->aplica[$value];

                if (isset($request->cumple[$value])) {
                    $respuesta->cumple = $request->cumple[$value];

                    if ($respuesta->cumple == 1) {
                        $respuesta->fuente = $request->fuente[$value];
                        $respuesta->observacion = $request->observacion[$value];
                    }
                }
                array_push($todasResp,$respuesta);
            }
        }

        //guardar las respuestas en un modelo cabecera
        $cabecera->seguridadSaludRespuestas = $todasResp;

        //creacion de la cabecera con las respuestas (tambien calcula los resultados)
        $registro = $this->SegSalCabRepository->crearCompleto($cabecera->toArray());

        return redirect()->route('segsal.index')->with('success','Nuevo registro creado correctamente fecha: '.$registro->fecha->format('d/m/Y').' Descripción: '.$registro->descripcion);
    }

    public function show($id)
    {
        $titulo = "Ver Resultados";

        $tabla = $this->SegSalCabRepository->tablaCompleta($id);
        $tablares = $this->SegSalCabRepository->tablaResultados($id);
        $rowspanelemento = [];

        for ($i=0; $i < count($tabla); $i++) {
            $var = 0;
            $indice = 0;

            for ($j=0; $j < count($tabla); $j++) {
                if ($tabla[$i]->elemento_id == $tabla[$j]->elemento_id) {
                    $var ++;
                    $indice = $j;
                }
            }
            $rowspanelemento[$i] = $var;
            $i = $indice;
        }
        $rowspanlineamiento = [];

        for ($i=0; $i < count($tabla); $i++) {
            $var = 0;
            $indice = 0;

            for ($j=0; $j < count($tabla); $j++) {
                if ($tabla[$i]->lineamiento_id == $tabla[$j]->lineamiento_id) {
                    $var ++;
                    $indice = $j;
                }
            }
            $rowspanlineamiento[$i] = $var;
            $i = $indice;
        }

        $cabecera = $this->SegSalCabRepository->find($id);
        return view('segsal.show',compact('titulo','cabecera','tabla','rowspanelemento','rowspanlineamiento','tablares'));

    }

    public function edit($id)
    {
        $segsalcab = $this->SegSalCabRepository->TraerCabeceraRespuestas($id);

        $lineamientos = $this->LineamientoRepository->traerPreguntas();
        $elementos = $this->ElementoRepository->getAll();
        $titulo = "Actualizar de Estudio de Linea Base";

        return view('segsal.form',compact('titulo','segsalcab','lineamientos','elementos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $cabecera = $this->SegSalCabRepository->TraerCabeceraRespuestas($id);

        //dar formato a la fecha e creacion
        $cabecera->fecha = Carbon::createFromFormat('Y-m-d',$request->fecha);


        $cabecera->descripcion = $request->descripcion;

        //array donde se guardaran las respuestas
        $todasResp = [];

        //recorrer todas las preguntas
        foreach ($request->nroPregunta as $value) {

            $respuesta = new SeguridadSaludRespuesta();


            //validar existencia en el request
            if (isset($request->aplica[$value])) {
                $respuesta->pregunta_id = $value;
                $respuesta->aplica = $request->aplica[$value];

                if (isset($request->cumple[$value])) {
                    $respuesta->cumple = $request->cumple[$value];

                    if ($respuesta->cumple == 1) {
                        $respuesta->fuente = $request->fuente[$value];
                        $respuesta->observacion = $request->observacion[$value];
                    }
                }
                array_push($todasResp,$respuesta);
            }
        }

        //guardar las respuestas en un modelo cabecera
        $cabecera->seguridadSaludRespuestas = $todasResp;

        //creacion de la cabecera con las respuestas (tambien calcula los resultados)
        $actualizado = $this->SegSalCabRepository->ActualizarCompleto($cabecera->toArray());


        return redirect()->route('segsal.index')->with('success','Registro actualizado correctamente fecha: '.$actualizado->fecha->format('d/m/Y').' Descripción: '.$actualizado->descripcion);
    }

    public function destroy($id)
    {
        $cabecera = $this->SegSalCabRepository->find($id);
        $descripcion = $cabecera->descripcion;
        $fecha = $cabecera->fecha;
        $this->SegSalCabRepository->delete($cabecera);
        return redirect()->route('segsal.index')->with('success','Registro eliminado correctamente fecha: '.' Descripción: '.$descripcion);
    }


    public function grafico($id)
    {

        $grafico = $this->SegSalCabRepository->grafico($id);
        return $grafico->toArray();
    }

    public function pdf($id)
    {

        $titulo = "Ver Resultados";

        $tabla = $this->SegSalCabRepository->tablaCompleta($id);
        $tablares = $this->SegSalCabRepository->tablaResultados($id);
        $rowspanelemento = [];

        for ($i=0; $i < count($tabla); $i++) {
            $var = 0;
            $indice = 0;

            for ($j=0; $j < count($tabla); $j++) {
                if ($tabla[$i]->elemento_id == $tabla[$j]->elemento_id) {
                    $var ++;
                    $indice = $j;
                }
            }
            $rowspanelemento[$i] = $var;
            $i = $indice;
        }
        $rowspanlineamiento = [];

        for ($i=0; $i < count($tabla); $i++) {
            $var = 0;
            $indice = 0;

            for ($j=0; $j < count($tabla); $j++) {
                if ($tabla[$i]->lineamiento_id == $tabla[$j]->lineamiento_id) {
                    $var ++;
                    $indice = $j;
                }
            }
            $rowspanlineamiento[$i] = $var;
            $i = $indice;
        }
        $cabecera = $this->SegSalCabRepository->find($id);

        $data = [
            'titulo' => $titulo,
            'tabla' => $tabla,
            'tablares' => $tablares,
            'cabecera' => $cabecera,
            'rowspanelemento' => $rowspanelemento,
            'rowspanlineamiento' => $rowspanlineamiento,
        ];
        //return view('segsal.pdf',compact('titulo','cabecera','tabla','rowspanelemento','rowspanlineamiento','tablares'));
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('segsal.pdf',$data)->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
}
