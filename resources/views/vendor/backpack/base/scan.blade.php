@extends('backpack::layout')



@section('header')
    <section class="content-header">
      <h1>
        Escaneo de QR<small>Coloque el código frente a la cámara</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Muestre su código aqui</div>
                </div>

                <div class="box-body">
                    <video id="video" width="400" height="290" autoplay></video>
                        <canvas id="canvas" width="400" height="290"></canvas>


                        <script type="text/javascript" src="{{asset('vendor/qcode-decoder.min.js')}}"></script>
                        <script>
                        //$(document).ready(function(){
                            var video = document.getElementById('video');

                            // Get access to the camera!
                            if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                                // Not adding `{ audio: true }` since we only want video now
                                navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
                                    video.src = window.URL.createObjectURL(stream);
                                    //video.play();
                                });
                            }

                            setInterval(readCode(), 3000);

                            function readCode()
                            {
                                QCodeDecoder()
                                    .decodeFromCamera(video, function(er,res){
                                        if (String(res).length > 17) {
                                            if (String(res).substring(11, 17) == "senasa") {
                                                document.cookie = "qrdata = " + res;
                                                console.log(document.cookie);
                                                alert("Código de Senasa detectado. Por favor espere un momento.");
                                                location.reload();
                                                
                                                /*
                                                req = $.ajax({
                                                       url: 'vendor/scrap.blade.php',
                                                       data: {'action': 'scrap', 'url': res},
                                                       type: 'post',
                                                       success: function(output) {
                                                           alert(output);
                                                        }
                                                      
                                               });
                                               */
                                            }


                                        }
                                        
                                    });
                            }
                            
                   
                        //});
                        </script>
                    </div>
                    <?php

                    function isNum($c){
                        if ($c == '1' or $c == '2' or $c == '3' or $c == '4' or $c == '5' or $c == '6' or $c == '7' or $c == '8' or $c == '9' or $c == '0'){
                            return true;
                        }
                        return false;
                    }

                    if(isset($_COOKIE['qrdata'])) {
                        $file = file_get_contents($_COOKIE['qrdata']);
                        unset($_COOKIE['qrdata']);
                        $res = setcookie('qrdata','', time() - 3600 );
                        libxml_use_internal_errors(true);
                        $doc = new DOMDocument();
                        $doc->loadHTML($file);
                        libxml_clear_errors();

                        $xpath = new DOMXPath($doc);

                        $imgs = $doc->getElementsByTagName('img');
                        $img = $imgs[1]->getAttribute('src');
                        $dueño = 'placeholder';
                        $responsable = 'asd';


                        $resp = $xpath->query('//ul[@id="ctl00_cphCotenido_blResponsable"]/li[1]');
                        $responsable = $resp[0]->nodeValue;
                        $index = strlen($responsable);

                        echo '<script language="javascript">';
                        echo '</script>';
                        for ($i = $index-1; $i>0; $i--){
                            if (isNum($responsable[$i])){
                                $index = $i;

                                break;
                            } 
                            
                        }

                        $responsable = substr($responsable, $index+3);
                        $direccion = "";

                        for($i = 0; $i<strlen($responsable); $i++){
                            if ($responsable[$i] == " "){
                                $direccion = $direccion . "_";
                            }
                            else{
                                $direccion = $direccion . $responsable[$i];
                            }
                        }


                        $disk = "uploads";
                        $destination_path = "/fierros";


                        $fierros = DB::table('productoresfinca')->where('fierro', $destination_path.'/'.$direccion.'.png')->first();

                        if ($fierros == NULL or count($fierros) == 0) {
                            $fierro = 'placeholder';
                        
                            
                                // 0. Make the image
                                $image = \Image::make($img);
                                // 1. Generate a filename.
                                $filename = $direccion.'.png';
                                // 2. Store the image on disk.
                                \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
                                // 3. Save the path to the database
                                $fierro = $destination_path.'/'.$filename;
                            
                        
                            DB::insert('insert into productoresfinca (fierro, nombre) values (?, ?)', [$fierro, $responsable]);

                            echo '<script language="javascript">';
                            echo 'alert("Se añadió el Fierro al sistema con éxito.");';
                            //echo 'window.location = "http://127.0.0.1:8000/admin/dashboard";';\
                            //echo 'alert('.$resp.');';
                            echo 'alert("Nombre archivo: '.$fierro.'");';
                            echo '</script>';
                            echo('<img src="'.$img.'">');
                        }
                        else{
                            echo '<script language="javascript">';
                            echo 'alert("El fierro ya existe en el sistema!");';
                            //echo 'window.location = "http://127.0.0.1:8000/admin/dashboard";';
                            //echo 'alert('.$resp.');';
                            echo '</script>';
                            echo '<p>Nombre del productor: '.$responsable.'</p>';
                            echo '<p>Imagen del Fierro:</p>';
                            echo('<img src="'.$img.'">');
                        }

                    }

                    ?>
                     
                </div>
            </div>
        </div>
    </div>
@endsection