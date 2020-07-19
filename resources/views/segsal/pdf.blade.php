
 <html lang="es">
     <!-- begin::Head -->
     <head>


        <!-- Original URL: https://keenthemes.com/metronic/preview/demo1/
        Date Downloaded: 11/12/2019 15:20:00 !-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <meta charset="utf-8" />

         <title>Instituto Nacional de Innovacion Agraria</title>
         <meta name="description" content="Updates and statistics" />
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

         <!--begin::Fonts -->

         <!--end::Fonts -->


         <style>
            .paginate_button {
                margin-left: .4rem !important;
            }
            .last,.first {
                background: #ebe9f2;

            }
            .paginate_button.current{
                background: #5d78ff;
                color: #fff;
            }
            .paginate_button.disabled{
                opacity: .6;
            }

            div.dataTables_pager>.dataTables_paginate *,.dataTables_paginate,.dataTables_pager  {
                display: flex !important;
            }

            .paginate_button:hover{
                background: #5d78ff;
                color: #fff;
            }

            .dataTables_pager,.dataTables_paginate {
                justify-content: space-between;
            }
            .paginate_button {
                color: #595d6e;
                border-radius: 3px;
                cursor: pointer;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                height: 2.25rem;
                min-width: 2.25rem;
                vertical-align: middle;
                padding: .5rem;
                text-align: center;
                position: relative;
                font-size: 1rem;
                line-height: 1rem;
                font-weight: 400;
                display: flex;
            }
            </style>
         <!-- Hotjar Tracking Code for keenthemes.com -->

        <!-- Global site tag (gtag.js) - Google Analytics -->

</head>
     <!-- end::Head -->

<!-- begin::Body -->
<body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed">
    <!-- begin:: Page -->
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
                    <div id="chart_div">asd</div>
                    <div id="grafico_elementos" style="height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>

    	 <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Global Theme Bundle -->
    <script src="{{ asset('assets/highchart/code/highcharts.js')}}"></script>
    <!--Begin::style-->
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

    <!--End::style-->
  <!--Load the AJAX API-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows([
        ['Mushrooms', 3],
        ['Onions', 1],
        ['Olives', 1],
        ['Zucchini', 1],
        ['Pepperoni', 2]
      ]);

      // Set chart options
      var options = {'title':'How Much Pizza I Ate Last Night',
                     'width':400,
                     'height':300};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
    </body>
     <!-- end::Body -->
 </html>

