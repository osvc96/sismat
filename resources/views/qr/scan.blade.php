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
                <style type="text/css">
                    #video{
                        position: relative;
                        left: 25%;
                    }
                </style>
                    <video id="video" width="500" height="430" autoplay></video>
                        <canvas id="canvas" width="400" height="430"></canvas>

                        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
                        <script type="text/javascript" src="{{asset('vendor/qcode-decoder.min.js')}}"></script>
                        
                        <script>

                            function readCookie(name) {
                                var nameEQ = name + "=";
                                var ca = document.cookie.split(';');
                                for(var i=0;i < ca.length;i++) {
                                    var c = ca[i];
                                    while (c.charAt(0)==' ') {
                                        c = c.substring(1,c.length);
                                    }
                                    if (c.indexOf(nameEQ) == 0) {
                                        return c.substring(nameEQ.length,c.length);
                                    }
                                }
                                return null;
                            }


                            var video = document.getElementById('video');
                            var scaneo = readCookie('scaneado');
                            if(scaneo!=1){

                                if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                                    // Not adding `{ audio: true }` since we only want video now

                                    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
                                        video.src = window.URL.createObjectURL(stream);
                                        setTimeout(video.play(), 1000);
                                    });
                                }

                                var interval = setInterval(readCode(), 3000);
                            }
                            else{
                                video.pause();
                            }
                            // Get access to the camera!
                            

                            function readCode()
                            {
                                QCodeDecoder()
                                    .decodeFromCamera(video, function(er,res){
                                        if (String(res).length > 17) {
                                            if (String(res).substring(11, 17) == "senasa") {
                                                clearInterval(interval);
                                                document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });

                                                document.cookie = "qrdata = " + res;
                                                setTimeout(location.reload(), 5000);
                                            }


                                        }
                                        
                                    });
                            }
                            
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
                        setcookie('scaneado',1);
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
                            //echo 'alert("Se añadió el Fierro al sistema con éxito.");';
                            echo 'var video = document.getElementById("video");';
                            echo 'video.pause();';
                            echo '</script>';
                            //echo '<p id="np">Nombre del productor: '.$responsable.'</p>';
                            //echo '<p>Imagen del Fierro: <img src="'.$img.'"></p>';
                        }
                        else{
                            echo '<script language="javascript">';
                            //echo 'alert("El fierro ya existe en el sistema!");';
                            echo 'var video = document.getElementById("video");';
                            echo 'video.pause();';
                            echo '</script>';
                            //echo '<p id="np">Nombre del productor: '.$responsable.'</p>';
                            //echo '<p>Imagen del Fierro: <img src="'.$img.'"></p>';
                        }
                        sleep(3);
                        return redirect('/admin/productorFinca');

                    }
                    else{
                        setcookie('scaneado', 0);
                    }

                    ?>
                     
                </div>
            </div>
        </div>
    </div>
@endsection