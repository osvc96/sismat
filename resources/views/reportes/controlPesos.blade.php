@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
       Control de Pesos<small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Control de Pesos</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Pesos totales de cada día del mes </div>
                </div>
                <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

                <!--<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
                <!--<script src="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></script>-->
                <div class="box-body table-responsive">

                     <table class="table table-bordered" id="pesos">
                      <thead>
                            <tr>
                                <th>Dia</th>
                                <th>Bovinos Macho</th>
                                <th>Bovinos Hembra</th>
                                <th>Cerdos</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($bovinos as $bovino)
                            

                            <tr>
                                <td>{{$bovino->dia}}</td>
                                <td>{{$bovino->machos}}kg </td>
                                <td>{{$bovino->hembras}}kg</td>
                                @foreach ($porcinos as $porcino)
                                @if ($porcino->dia == $bovino->dia)
                                  <td>{{$porcino->pesos}}kg</td>
                                @else
                                  <td>---------</td>
                                @endif
                                @endforeach

                            </tr>
                        @endforeach
                       </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    <!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
    <script type="text/javascript">

    var d = new Date();
    var mes;
    switch (d.getMonth()){
      case 1:
        mes = 'Enero';
        break;
      case 2:
        mes = 'Febrero';
        break;
      case 3:
        mes = 'Marzo';
        break;
      case 4:
        mes = 'Abril';
        break;
      case 5:
        mes = 'Mayo';
        break;
      case 6:
        mes = 'Junio';
        break;
      case 7:
        mes = 'Julio';
        break;
      case 8:
        mes = 'Agosto';
        break;
      case 9:
        mes = 'Septiembre';
        break;
      case 10:
        mes = 'Octubre';
        break;
      case 11:
        mes = 'Noviembre';
        break;
      case 12:
        mes = 'Diciembre';
        break;
    }

    var table = $('#pesos').dataTable({
        dom: 'Bfrtip',
        buttons: [
            {extend: 'print', text: 'Imprimir Tabla', message: mes + " " + d.getFullYear() , title: function(){
              return 'Control Mensual de Pesos - Planta Matanza ITCR';
            }}
        ]
    });
      
      </script>


@endsection