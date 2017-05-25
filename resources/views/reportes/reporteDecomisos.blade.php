@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
       Boletas de Decomisos<small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Generación de Boletas de Decomisos</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Decomisos de Bovinos</div>
                </div>
                <div class="box-body table-responsive">

                     <table class="table table-bordered" id="decomisos-bovinos">
                      <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Canales</th>
                                <th>Organos</th>
                                <th>Enfermedades</th>
                                <th>Fecha</th>
                                <th>Generar Boleta</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($bovinos as $bovino)
                            <tr>
                                <td>{{$bovino[0]}}</td>
                                <td>{{$bovino[1]}}</td>
                                <td>{{$bovino[2]}}</td>
                                <td>{{$bovino[3]}}</td>
                                <td>{{$bovino[4]}}</td>
                                <td class="details-control"></td>
                            </tr>
                        @endforeach
                       </tbody>
                    </table>
                    
                </div>
            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Decomisos de Porcinos</div>
                </div>
                <div class="box-body table-responsive">
                <table class="table table-bordered" id="decomisos-porcinos">
                <thead>
                    <tr>
                      <th>Cliente</th>
                      <th>Canales</th>
                      <th>Organos</th>
                      <th>Enfermedades</th>
                      <th>Fecha</th>
                      <th>Generar Boleta</th>
                    </tr>
                </thead>
                <tbody id="matanzaPorcino">
                  @foreach ($porcinos as $porcino) 
                    <tr>
                      <td>{{$porcino[0]}}</td>
                      <td>{{$porcino[1]}}</td>
                      <td>{{$porcino[2]}}</td>
                      <td>{{$porcino[3]}}</td>
                      <td>{{$porcino[4]}}</td>
                      <td class="details-control"></td>
                </tr>
              @endforeach
                </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>
    <style media="screen" type="text/css">

    td.details-control {
      background: url('<?= asset('images/newspaper.png') ?>') no-repeat center center;
      background-size: 8% 60%;
      cursor: pointer;
    }
    </style>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

    <script type="text/javascript">

      var table = $('#decomisos-bovinos').DataTable();
      var tableP = $('#decomisos-porcinos').DataTable();
      var tipo = 'Bovino';
      
      function generateReport(data){
        var doc = new jsPDF();
        doc.setFontSize(12);
        var y = 57;
        doc.text('BOLETA DE DECOMISOS PLANTA MATANZA',60, 15);
        doc.text('INST. TECNOLÓGICO DE COSTA RICA', 63, 20);
        doc.text('# CANALES: '+data[1].substring(0, data[1].length-2), 20, 38);
        doc.text('CLIENTE: '+data[0], 20, 30);
        doc.text('FECHA: '+data[4], 130, 30);
        doc.text('ORGANOS DECOMISADOS', 20, 46);
        doc.text('CAUSAS', 115, 46);
        doc.line(18, 49 , 190, 49);
        var organos = data[2].split(" - ");
        
        var enfermedades = data[3].split(" - ");
        var org;
        var enf;
        for (var i = 0; i<organos.length; i++){

            org = organos[i];
            enf = enfermedades[i];
            if(i == organos.length-1){
              org = org.substring(0,org.length-1); 
              enf = enf.substring(0,enf.length-1);
            }
            doc.text(org, 20, y);
            doc.text(enf, 115, y);
            doc.line(18, y+2, 190, y+2);
            y=y+8;  
          
          
        }

        doc.text('M.V. Jaime Galindo / Coordinador Planta Matanza', 20, y);

        doc.save('decomiso'+tipo+'_'+data[0]+'_'+data[4]+'.pdf');
      }

      $('#decomisos-bovinos tbody').on('click', 'td.details-control', function () {
          
          tipo = 'Bovino';
          var tr = $(this).parents('tr');
          var row = table.row( tr );
          generateReport(row.data());


        } );

      $('#decomisos-porcinos tbody').on('click', 'td.details-control', function () {
          
          tipo = 'Porcino';
          var tr = $(this).parents('tr');
          var row = tableP.row( tr );
          generateReport(row.data());


        } );

    </script>

@endsection