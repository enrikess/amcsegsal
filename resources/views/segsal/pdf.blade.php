
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
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #fff;
  color: #024457;

}
.responstable tr {
  border: 1px solid #d9e4e6;
}
.responstable tr:nth-child(odd) {
  background-color: #eaf3f3;
}
.responstable th {
  display: none;
  border: 1px solid #fff;
  background-color: #167f92;
  color: #fff;
  padding: 0.5em;
}
.responstable th:first-child {
  display: table-cell;

}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}

  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }

.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #d9e4e6;
}

  .responstable td {
    border: 1px solid #d9e4e6;
  }

.responstable th,
.responstable td {
  text-align: left;
  margin: 0.5em 1em;
}

  .responstable th,
  .responstable td {
    display: table-cell;
    padding: 0.5em;
    font-size: 10px;
    float: left;
  }


body {
  padding: 0 2em;
  font-family: Arial, sans-serif;

}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
  text-align: center
}
.titulo h1 span {
  color: #167f92;
}

</style>
</head>
<body>

    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="kt-portlet">
                <div>
                    <div class="titulo">
                        <h1><span>Resultado de la Evaluación</span>
                        </h1>
                    </div>
                </div>
                <div class="kt-portlet__body" >
                    <div class="kt-widget13">
                        <div class="kt-widget13__item" >
                            <span><b>Descripción:</b></span>
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
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Tabla de Respuestas
                        </h3>
                    </div>
                </div>
                <div>
                    <table class="responstable">
                        <thead>
                            <tr>
                                <th style="width: 100px">Elemento</th>
                                <th >Lineamiento</th>
                                <th style="width: 30px">Item</th>
                                <th style="width: 300px">Indicador</th>
                                <th >Fuente</th>
                                <th style="width: 15px">Si</th>
                                <th style="width: 15px">No</th>
                                <th style="width: 20px">No Aplica</th>
                                <th >Observación</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_linea_base_resultado_body">
                            @for ($i = 0; $i < count($tabla); $i++)
                            <tr>
                                <td>{{ $tabla[$i]->elemento }}</td>
                                <td>{{ $tabla[$i]->lineamiento }}</td>
                                <td>{{ $i+1 }}</td>
                                <td>{!! $tabla[$i]->pregunta !!}</td>
                                <td>{{ $tabla[$i]->fuente }}</td>
                                <td>{{ isset($tabla[$i]->aplica) &&  $tabla[$i]->cumple == 1 ? 'X' : '' }}</td>
                                <td>{{ isset($tabla[$i]->aplica) && $tabla[$i]->cumple == 0 ? 'X' : '' }}</td>
                                <td>{{ empty($tabla[$i]->aplica)  ?  'X' : '' }}</td>
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
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Tabla de Resultados
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="responstable">
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
    </body>
 </html>

