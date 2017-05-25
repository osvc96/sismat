@extends('backpack::layout')

@section('header')
    <section class="content-header" id="matanza">
      <h1>Control Diario de Matanza<small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Control Diario de Matanza</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Matanza de Bovinos</div>
                    </div>
                    <div class="box-body table-responsive">
                    <table class="table table-bordered" id="matanza-table">
				        <thead>
				            <tr>
				            	<th></th>
				            	<th>Día</th>
				                <th>Total</th>
				                <th>Terneras</th>
				                <th>Terneros</th>
				                <th>Novillas</th>
				                <th>Novillos</th>
				                <th>Vacas</th>
				                <th>Toros</th>
				                <th>Hembras preñadas</th>	
				            </tr>
				        </thead>
				        <tbody id="matanza">
					        @foreach ($registros as $registro) 
					        	<tr>
					        		<td class="details-control" )"></td>
					        		<td>{{$registro->dia}}</td>
					        		<td>{{$registro->total}}</td>
					        		<td>{{$registro->terneras}}</td>
					        		<td>{{$registro->terneros}}</td>
					        		<td>{{$registro->novillas}}</td>
					        		<td>{{$registro->novillos}}</td>
					        		<td>{{$registro->vacas}}</td>
					        		<td>{{$registro->toros}}</td>
					        		<td>{{$registro->prenez}}</td>
								</tr>
							@endforeach
				        </tbody>
			    	</table>
			    	</div>
            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Matanza de Porcinos</div>
                </div>
                <div class="box-body table-responsive">
                <table class="table table-bordered" id="matanza-porcinos">
				        <thead>
				            <tr>
				            	<th></th>
				            	<th>Día</th>
				                <th>Total</th>
				                <th>Machos</th>
				                <th>Hembras</th>
				            </tr>
				        </thead>
				        <tbody id="matanzaPorcino">
					        @foreach ($registrosPorcinos as $registro) 
					        	<tr>
					        		<td class="details-control" )"></td>
					        		<td>{{$registro->dia}}</td>
					        		<td>{{$registro->total}}</td>
					        		<td>{{$registro->machos}}</td>
					        		<td>{{$registro->hembras}}</td>
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
	    background: url('<?= asset('images/plus.svg') ?>') no-repeat center center;
	    background-size: 100% 100%;
	    cursor: pointer;
		}
		tr.shown td.details-control {
		    background: url('<?= asset('images/less.svg') ?>') no-repeat center center;
		    background-size: 100% 100%;
		}
	</style>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
	<?php

	 $dBovinos = array();
     $dPorcinos = array();

     foreach ($decomisosBovinos as $decomiso){
         array_push($dBovinos, [$decomiso->canal, $decomiso->organo, $decomiso->enfermedad, $decomiso->dia]);
     }

     foreach ($decomisosPorcinos as $decomiso){
         array_push($dPorcinos, [$decomiso->canal, $decomiso->organo, $decomiso->enfermedad, $decomiso->dia]);
     }

     $dbArray = json_encode($dBovinos);
     $dpArray = json_encode($dPorcinos);

	?>


	<script type="text/javascript">

		var table = $('#matanza-table').DataTable();
		var tableP = $('#matanza-porcinos').DataTable();


		var db = <?php echo $dbArray; ?>;
        var dp = <?php echo $dpArray; ?>;

		function format ( d ) {
    // `d` is the original data object for the row
		    return '<table cellpadding="10" cellspacing="10" border="1" style="padding-left:100px;">'+
		    	'<thead>' +
			        '<tr>'+
			            '<td>Canal</td>'+
			            '<td>Órgano</td>'+
			            '<td>Enfermedad</td>'+
			        '</tr>'+
			     '</thead>'+
		        '<tbody>'+
		        	d+
		        '</tbody>'+
		    '</table>';
		}

		

 
		$('#matanza-table tbody').on('click', 'td.details-control', function () {
		    
		    var tr = $(this).parents('tr');
		    var row = table.row( tr );

		    

		   
			
			var s = ''
			for (var i = 0; i<db.length; i++){
				if (db[i][3] == row.data()[1]){
					s = s + '<tr>'+
					'<td>'+db[i][0]+'</td>'+
				    '<td>'+db[i][1]+'</td>'+
				    '<td>'+db[i][2]+'</td>'+
				    '</tr>'
				} 
			}
		    //row.data()[1] esta el día que se deben mostrar los órganos decomisados
		    //alert(row.data()[1]);

		 
		    if ( row.child.isShown() ) {
		        // This row is already open - close it
		        row.child.hide();
		        tr.removeClass('shown');
		    }
		    else {
		        // Open this row (the format() function would return the data to be shown)
	
		       	row.child(format(s)).show();
		       	tr.addClass('shown');
		    	
		    }
		} );

		$('#matanza-porcinos tbody').on('click', 'td.details-control', function () {
		    
		    var tr = $(this).parents('tr');
		    var row = tableP.row( tr );

	
			
			var s = ''
			for (var i = 0; i<dp.length; i++){
				if (dp[i][3] == row.data()[1]){
					s = s + '<tr>'+
					'<td>'+dp[i][0]+'</td>'+
				    '<td>'+dp[i][1]+'</td>'+
				    '<td>'+dp[i][2]+'</td>'+
				    '</tr>'
				} 
			}
		    //row.data()[1] esta el día que se deben mostrar los órganos decomisados
		    //alert(row.data()[1]);

		 
		    if ( row.child.isShown() ) {
		        // This row is already open - close it
		        row.child.hide();
		        tr.removeClass('shown');
		    }
		    else {
		        // Open this row (the format() function would return the data to be shown)
	
		       	row.child(format(s)).show();
		       	tr.addClass('shown');
		    	
		    }
		} );

	</script>
@endsection