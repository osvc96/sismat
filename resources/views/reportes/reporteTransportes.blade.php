<?php

        $transportistaTable = DB::table('hojastransporte')->where('hojastransporte.id', $entry)
        ->join('transportistas', 'hojastransporte.id_transportista', '=', 'transportistas.id')
        ->select('transportistas.nombre as transportista')
        ->first();

        $canalesBovinosTable = DB::table('transporte_canalbovino')
        ->join('hojastransporte', 'transporte_canalbovino.transporte_id','=', 'hojastransporte.id')
        ->join('matanzabovinos', 'transporte_canalbovino.canal_id', '=', 'matanzabovinos.id')
        ->join('establecimientosdestino', 'matanzabovinos.destino_id', '=', 'establecimientosdestino.id')
        ->select('matanzabovinos.canal as canal', 'establecimientosdestino.nombre as destino', 'establecimientosdestino.direccion as dir')
        ->where('hojastransporte.id', $entry)
        ->orderBy('establecimientosdestino.id', 'asc')
        ->get();
        //->orderBy('canal');

        $canalesPorcinosTable = DB::table('transporte_canalporcino')
        ->join('hojastransporte', 'transporte_canalporcino.transporte_id','=', 'hojastransporte.id')
        ->join('matanzaporcinos', 'transporte_canalporcino.canal_id', '=', 'matanzaporcinos.id')
        ->join('establecimientosdestino', 'matanzaporcinos.destino_id', '=', 'establecimientosdestino.id')
        ->select('matanzaporcinos.canal as canal', 'establecimientosdestino.nombre as destino', 'establecimientosdestino.direccion as dir')
        ->where('hojastransporte.id', $entry)
        ->orderBy('establecimientosdestino.id', 'asc')
        ->get();
        //->orderBy('canal');

        $canalesBovinos = array();
        $canalesPorcinos = array();

        $destinosBovinos = array();
        $destinosPorcinos = array();

        $direccionesBovinos = array();
        $direccionesPorcinos = array();

        foreach ($canalesBovinosTable as $canal){
            array_push($canalesBovinos, $canal->canal);
            array_push($destinosBovinos, $canal->destino);
            array_push($direccionesBovinos, $canal->dir);
        }

        foreach ($canalesPorcinosTable as $canal){
            array_push($canalesPorcinos, $canal->canal);
            array_push($destinosPorcinos, $canal->destino);
            array_push($direccionesPorcinos, $canal->dir);
        }

        $cbArray = json_encode($canalesBovinos);
        $debArray = json_encode($destinosBovinos);
        $dibArray = json_encode($direccionesBovinos);

        $cpArray = json_encode($canalesPorcinos);
        $depArray = json_encode($destinosPorcinos);
        $dipArray = json_encode($direccionesPorcinos);

        $transportista = $transportistaTable->transportista;
        //$canal = $queryBuilder->canal;
        //$destino = $queryBuilder->destino;


        ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script type="text/javascript">

 function generateReport(){
        var doc = new jsPDF();
        var y = 65;
        var x = 8;

        var t = "<?php echo $transportista; ?>";
        var id = "<?php echo $entry; ?>";
        var dia = new Date();
        var dd = dia.getDate();
        var mm = dia.getMonth();
        var yyyy = dia.getFullYear();

        if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        } 

        var hoy = dd+'/'+mm+'/'+yyyy;

        var canalesBovinos = <?php echo $cbArray; ?>;
        var destinosBovinos = <?php echo $debArray; ?>;
        var direccionesBovinos = <?php echo $dibArray; ?>;

        var canalesPorcinos = <?php echo $cpArray; ?>;
        var destinosPorcinos = <?php echo $depArray; ?>;
        var direccionesPorcinos = <?php echo $dipArray; ?>;

        var destB = destinosBovinos[0];
        var destP = destinosPorcinos[0];

        doc.setFontSize(12);

        doc.text('HOJA TRANSPORTE PLANTA MATANZA', 60, 15);
        doc.text('INST. TECNOLÓGICO DE COSTA RICA', 61, 20);
        
        doc.text('P.M: '+id+'-'+yyyy, 25, 29);
        doc.text('FECHA: ' + hoy, 140, 29);
        doc.text('TRANSPORTISTA: ' + t, 60, 40);


        doc.text('CANALES BOVINOS', 75, 49);
        doc.line(5, 51, 205, 51);

        doc.text('# CANAL', 20, 56);
        doc.text('CARNICERÍA', 85, 56);
        doc.text('LUGAR', 155, 56);
        doc.line(5, 59, 205, 59)

        doc.text(destB, 66, y);
        doc.text(direccionesBovinos[0], 136, y);

        for (var i = 0; i<canalesBovinos.length; i++){
            if (i%5==0 && i!=0){
                x = 8;
                y+=5;
            }
            if (destinosBovinos[i] != destB){
                destB = destinosBovinos[i];

                //dibujar linea cuando ya son canales de otro destino
                doc.line(5, y+2, 205, y+2)
                y+=8;
                x = 8;
                doc.text(destB, 66, y);
                doc.text(direccionesBovinos[i], 136, y);
                
            }

            doc.text(String('-'+canalesBovinos[i]), x, y);
            x+=10;   
        }
        
        doc.line(5, y+5, 205, y+5);
        doc.text('CANALES PORCINOS', 75, y+12);

        x = 8;
        y = y+12;

        doc.line(5, y+4, 205, y+4);
        y = y+10;

        if (canalesPorcinos.length > 0){

            doc.text(destP, 66, y);
            doc.text(direccionesPorcinos[0], 136, y);
            for (var i = 0; i<canalesPorcinos.length; i++){
                if (i%5==0 && i!=0){
                    x = 8;
                    y+=5;
                }
                if (destinosPorcinos[i] != destP){
                    destP = destinosPorcinos[i];

                    //dibujar linea cuando ya son canales de otro destino
                    doc.line(5, y+2, 205, y+2)
                    y+=8;
                    x = 8;
                    doc.text(destP, 66, y);
                    doc.text(direccionesPorcinos[i], 136, y);
                    
                }

                doc.text(String('-'+canalesPorcinos[i]), x, y);
                x+=10;   
            }
        }

        doc.rect(5, 43, 200, y-35);
        doc.line(65, 43, 65, y+8);
        doc.line(135, 43, 135, y+8);

        doc.text('AUTORIZADO', 80, y+13);
        doc.text("MV. JAIME GALINDO R", 20, y+22);
        doc.text('COORDINADOR PLANTA MATANZA', 110, y+22);
        doc.text('RECIBIDO:', 20, y+35);
        doc.line(43, y+36, 171, y+36);

        doc.text('ENTREGADO:', 50, y+45);
        doc.line(79, y+46, 125, y+46);        

        doc.save('Hoja_'+t.replace(/ /g,"_")+'_'+hoy+'.pdf');
        window.history.back();

    }

    generateReport();

 </script>
