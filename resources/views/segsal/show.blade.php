@extends('layout')
@section('style')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/amcharts/lib/3/plugins/export/export.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
   <script src="{{ asset('segsal/show.js')}}" type="text/javascript"></script>


    <script src="{{ asset('assets/amcharts/lib/3/amcharts.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/amcharts/lib/3/serial.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/amcharts/lib/3/radar.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/amcharts/lib/3/pie.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/amcharts/lib/3/plugins/tools/polarScatter/polarScatter.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/amcharts/lib/3/plugins/animate/animate.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/amcharts/lib/3/plugins/export/export.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/amcharts/lib/3/themes/light.js')}}" type="text/javascript"></script>
    <script>


    </script>
@endsection


@section('content')

    <div class="row">

        <div class="col-md-4 offset-md-4">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Resultado de la Evaluación
                        </h3>
                    </div>
                </div>



                <div class="kt-portlet__body" >
                    <div class="kt-widget13">
                        <div class="kt-widget13__item" >
                            <span class="kt-widget13__desc"><b>Descripción:</b></span>
                            <span class="kt-widget13__desc">{{  $cabecera->descripcion }}</span>
                            <input value="{{  $cabecera->id }}" name="id_cabecera" id="id_cabecera" type="hidden">
                        </div>
                        <div class="kt-widget13__item" >
                            <span class="kt-widget13__desc"><b>Fecha de Creación:</b></span>
                            <span class="kt-widget13__desc">{{ Carbon\Carbon::parse( $cabecera->fecha)->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Tabla de Respuestas
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="tabla_linea_base_resultado" name="tabla_linea_base_resultado">
                        <thead class="thead-dark">
                            <tr>
                                <th>Lineamiento</th>
                                <th>Item</th>
                                <th>Indicador</th>
                                <th>Fuente</th>
                                <th>Si</th>
                                <th>No</th>
                                <th>No Aplica</th>
                                <th>Observación</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_linea_base_resultado_body">
                            @for ($i = 0; $i < count($tabla); $i++)
                            @if (isset($rowspanelemento[$i]))
                                <tr>
                                    <td colspan="9" class="table-primary">{{ $tabla[$i]->elemento }}</td>
                                </tr>
                            @endif
                            <tr>
                                @if (isset($rowspanlineamiento[$i]))

                                        <td rowspan="{{ $rowspanlineamiento[$i] }}">{{ $tabla[$i]->lineamiento }}</td>

                                @endif
                                <td>{{ $i+1 }}</td>
                                <td>{{ $tabla[$i]->pregunta }}</td>
                                <td>{{ $tabla[$i]->fuente }}</td>
                                <td>{{ $tabla[$i]->cumple == 1 &&  $tabla[$i]->cumple != null ? 'X' : '' }}</td>
                                <td>{{ $tabla[$i]->cumple == 0 && $tabla[$i]->cumple != null ? 'X' : '' }}</td>
                                <td>{{ $tabla[$i]->aplica == 1 ?  '' : 'X' }}</td>
                                <td>{{ $tabla[$i]->observacion }}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Tabla de Resultados
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="tabla_linea_base_resultado" name="tabla_linea_base_resultado">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nro</th>
                                <th>Descripción</th>
                                <th>Total Aplica</th>
                                <th>Total Cumple</th>
                                <th>% de Cumplimiento</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_linea_base_resultado_body">
                            @for ($i = 0; $i < count($tablares); $i++)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $tablares[$i]->elemento }}</td>
                                <td>{{ $tablares[$i]->aplica }}</td>
                                <td>{{ $tablares[$i]->cumple }}</td>
                                <td>{{ $tablares[$i]->porcentaje }}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
             <!--begin::Portlet-->
             <div class="kt-portlet">
                 <div class="kt-portlet__head">
                     <div class="kt-portlet__head-label">
                         <span class="kt-portlet__head-icon kt-hidden">
                             <i class="la la-gear"></i>
                         </span>
                         <h3 class="kt-portlet__head-title">
                            Gráfico Resumen
                         </h3>
                     </div>
                 </div>
                 <div class="kt-portlet__body">
                     <div id="grafico_elementos" style="height: 500px;"></div>
                 </div>
             </div>
        </div>
    </div>


@endsection
