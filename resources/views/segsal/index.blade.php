@extends('layout')
@section('style')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
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
                        <th>Fecha</th>
                        <th>Motivo</th>
                        <th>Calificación Obtenida</th>
                        <th>Estimación</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody id="tabla_marcas_body">
                </tbody>
            </table>

            <!--end: Datatable -->
        </div>
        </div>




        <!--begin: Modal crear marca-->
        <div class="modal fade" id="modal_agregar_marca" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        </div>
        <!--end: Modal crear marca-->
        <!--begin: Modal crear marca-->
        <div class="modal fade" id="modal_editar_marca" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        </div>
        <!--end: Modal crear marca-->
    </div>
</div>
@endsection
