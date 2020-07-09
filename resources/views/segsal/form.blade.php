@extends('layout')
@section('style')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{ asset('segsal/form.js')}}" type="text/javascript"></script>
@endsection


@section('content')
<div class="row">

	<div class="col-md-6 offset-md-3">
		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						{{ $titulo }}
					</h3>
				</div>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label  class="col-2 col-form-label">Elemento:</label>
                    <div class="col-10">
                        <select id="cmbElemento" name="cmbElemento" class="form-control" onchange="cmbLineamiento()">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-2 col-form-label">Lineamiento:</label>
                    <div class="col-10">
                        <select id="cmbLineamiento" name="cmbLineamiento" class="form-control" onchange="preguntasLineamiento(this.value)">
                        </select>
                    </div>
                </div>

            </div>
		</div>
	</div>

</div>
<form method="POST" action="{{ route('segsal.store') }}">
    @csrf
    <div class="row">

        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head row" style="padding: 20px 25px;">
                    <div class="col-lg-10 row">
                        <div class="form-group row col-6" >
                            <label class="col-4 col-form-label">Descripción:</label>
                            <div class="col-8">
                                <input class="form-control" type="text" name="descripcion" value="{{  $segsalcab->descripcion }}">
                                <input class="form-control" type="hidden" name="calificacion" value="12">
                                <input class="form-control" type="hidden" name="tipo_id" value="1">
                            </div>
                        </div>
                        <div class="form-group row col-6" >
                            <label class="col-4 col-form-label">Fecha de Creación:</label>
                            <div class="col-8">
                                <input class="form-control" readonly type="date" name="fecha" value="{{  $segsalcab->fecha }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <a onclick="calcularResultados()" class="btn btn-label-facebook float-right"><i class="fa fa-calculator"></i> Calcular </a>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($lineamientos as $lineamiento)

                        <table class="table table-striped- table-bordered table-hover table-checkable d-none" data-elemento="{{ $lineamiento->elemento->id }}" name="lineamiento[]" id="lineamiento_{{ $lineamiento->id }}">
                            <thead>
                                <tr>
                                    <th style="width: 5%"></th>
                                    <th style="width: 30%">Descripción</th>
                                    <th style="width: 5%">Aplica</th>
                                    <th style="width: 10%">Cumple</th>
                                    <th>Fuente</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody id="tabla_linea_base_respuesta_body">
                                @foreach ($lineamiento->preguntas as $pregunta)
                                <tr name="fila_pregunta[]" id="pregunta_{{ $pregunta->id }}" >
                                    <td >{{ $lineamiento->id }}.{{ $pregunta->id }}</td>
                                    <td >{{ $pregunta->descripcion }}</td>
                                    <td>
                                        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                            <label>
                                                <input type="hidden" name="nroPregunta[]" value="{{ $pregunta->id }}">
                                                <input type="checkbox" onchange ="estado_pregunta(this,{{ $pregunta->id }})" value="1" checked="checked" name="aplica[{{ $pregunta->id }}]" id="aplica[{{ $pregunta->id }}]">
                                                <span></span>
                                            </label>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio">
                                                <input type="radio" name="cumple[{{ $pregunta->id }}]" id="cumple_{{ $pregunta->id }}_true" value="1">si
                                                <span></span>
                                            </label>
                                            <label class="kt-radio">
                                                <input type="radio" name="cumple[{{ $pregunta->id }}]" id="cumple_{{ $pregunta->id }}_false" value="0">no
                                                <span></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td ><textarea class="form-control" name="fuente[{{ $pregunta->id }}]" id="fuente_{{ $pregunta->id }}" rows="2"></textarea></td>
                                    <td ><textarea class="form-control" name="observacion[{{ $pregunta->id }}]" id="observacion_{{ $pregunta->id }}" rows="2"></textarea></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    @endforeach

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
                        <h3 class="kt-portlet__head-title">Resultado de la Evaluación
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="tabla_linea_base_resultado" name="tabla_linea_base_resultado">
                        <thead>
                            <tr>
                                <th style="width: 5%"></th>
                                <th style="width: 30%">Descripción</th>
                                <th style="width: 5%">Total Aplica</th>
                                <th style="width: 10%">Cumplen</th>
                                <th>% de Cumplimiento</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_linea_base_resultado_body">
                            @foreach ($elementos as $elemento)

                            <tr id="elemento_resultado_{{ $elemento->id }}" data-resultadoelemento="{{ $elemento->id }}">
                                <td></td>
                                <td>{{ $elemento->nombre }}</td>
                                <td id="total_{{ $elemento->id }}"></td>
                                <td id="cumplen_{{ $elemento->id }}"></td>
                                <td id="porcentaje_{{ $elemento->id }}"></td>
                                <td id="estado_{{ $elemento->id }}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="card-body">
                    <button  type="submit" class="fa fa-save"><i class="socicon-twitter"></i> Guarcar </button>

                </div>
            </div>
        </div>
    </div>

</form>

@endsection
