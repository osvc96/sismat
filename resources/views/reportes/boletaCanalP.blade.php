<?php 
	
	$canalTable = DB::table('matanzaporcinos')->where('matanzaporcinos.id','=', $entry)
	->join('establecimientosdestino', 'matanzaporcinos.destino_id', '=', 'establecimientosdestino.id')
	->selecT('establecimientosdestino.propietario as cliente', 'matanzaporcinos.canal as canal', 'matanzaporcinos.sexo as sexo', 'matanzaporcinos.pesoCanal as peso')->first();
	//echo "<script>alert(".$canalTable->canal.")</script>";

	$data = array($canalTable->cliente, $canalTable->canal, $canalTable->sexo, $canalTable->peso);
	
	$array = json_encode($data);
 ?>
 <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
 <script type="text/javascript">

 	var data;
 	var cliente;
 	var canal;
 	var sexo;
 	var peso;

	data = <?php echo $array; ?>;
 	cliente = data[0];
 	canal = data[1];
 	sexo = data[2];
 	peso = data[3]+'kg';

 		

 	function generateReport(){
 		var doc = new jsPDF('landscape');
 		doc.setFontSize(12);

 		if (sexo == 'M'){
 			sexo = 'Macho';
 		}
 		else{
 			sexo = 'Hembra';
 		}
 		

 		var D = new Date();

 		var fecha = D.getDate()+'/'+D.getMonth()+'/'+D.getFullYear();

 		var hora = D.getHours()+':'+D.getMinutes();

 		doc.rect(5, 5, 127, 35);
 		doc.line(5, 15, 132, 15);
 		doc.line(71, 5, 71, 15);

 		doc.text('Cliente: '+cliente, 7, 10);
 		doc.text('Fecha y hora: '+fecha+' - '+hora, 72, 10);
 		doc.text('# Canal: '+canal, 7, 20);
 		doc.text('Sexo: '+sexo, 7, 25);
 		doc.text('Peso en Canal: '+peso, 7, 30);

 		doc.save('boleta_canal'+canal+'_'+fecha+'.pdf');

 		window.history.back();

 	}

 	generateReport();
 </script>	