<?php

namespace App\Http\Controllers;

use App\Contracts\IElementoRepository;
use App\Contracts\ILineamientoRepository;
use App\Contracts\ISeguridadSaludCabeceraRepository;
use App\Contracts\ISeguridadSaludRespuestaRepository;
use App\Contracts\ISeguridadSaludResultadoRepository;
use App\Models\SeguridadSaludCabecera;
use App\Models\SeguridadSaludRespuesta;
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
        return view('segsal.index',compact('titulo'));

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

        return redirect()->route('segsal.index')->with('success','Nuevo registro creado correctamente fecha: '.$registro->fecha->format('d/m/Y').' Descripcion: '.$registro->descripcion);
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
