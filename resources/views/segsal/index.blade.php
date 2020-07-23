@extends('layout')
@section('style')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('segsal/index.js')}}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        {{ $titulo }}
                        <small></small>
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i> Exportar
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" id="exportar" name="exportar"></div>
                            </div>
                            &nbsp;
                            <a  class="btn btn-brand btn-elevate btn-icon-sm" href="{{ url('/segsal/create') }}">
                                <i class="la la-plus"></i>
                                Nuevo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" >
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Fecha</th>
                            <th>Motivo</th>
                            <th>Calificación Obtenida</th>
                            <th>Estimación</th>
                            <th>PDF</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    @php
                        $index = 1;
                    @endphp
                    <tbody id="tabla_marcas_body">
                        @foreach ($cabeceras as $cabecera)
                        <tr name="" id="" >
                            <td><a class="btn btn-info btn-md" href="{{route('segsal.show', $cabecera->id)}}">{{ $index }}</a></td>
                            <td >{{ $cabecera->fecha }}</td>
                            <td >{{ $cabecera->descripcion }}</td>
                            <td >{{ $cabecera->calificacion }}</td>
                            <td><span class='btn btn-bold btn-md btn-font-md btn-label-{{$cabecera->estimacion->color}}' >{{$cabecera->estimacion->nombre}}</span></td>
                            <td ><a href="{{route('segsal.pdf', $cabecera->id)}}" target="_blank" class="btn btn-label-instagram"><i class="la la-file-pdf-o"></i> Ver PDF </a></td>
                            <td ><a href="{{route('segsal.edit', $cabecera->id)}}" class="btn btn-label-instagram"><i class="la la-edit"></i> Editar </a></td>
                            <td ><a onclick="EliminarRegistro('{{ $cabecera->id }}','{{ $cabecera->fecha }}','{{ $cabecera->descripcion }}')" class="btn btn-label-google"><i class="la la-edit"></i> Eliminar </a></td>
                            @php
                                $index= $index + 1;
                            @endphp
                            @endforeach
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
</div>
@endsection
