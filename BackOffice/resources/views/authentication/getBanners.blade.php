<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/globales.css');  }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/normalize.css');  }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/getBanners.css');  }}">
    <title>Cargar Banners</title>
</head>
<body>
    
    <section>
        <div>

            <form action="{{ route('banner.auth') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen">
                <br>
                <label id="tipo "for="tipo">Tipo</label> 
                <input type="text" name="tipo" id="tipo"> 
                <br>
                <input class="button" type="submit" value="Enviar">
            </form>
        </div>

        @isset($subido)
        
        <div class="tabla-grid">
                
                
                    <div class="datosimg">
                        <p>Datos</p>
                        <p>Ficha técnica</p>
                    </div>
                    
                    
                    <div class="datosimg">
                        <p>Nombre original</p>
                        <p class="MEh">{!! $originalName !!}</p>
                    </div>

                    <div class="datosimg">
                        <p>Nombre final</p>
                        <p>TrhBQUDKRE285lZHZcaA5nSj1q6sJFaNNeqskHA7D9uUjTWmir.png</p>
                    </div>


                
                        <div class="datosimg">
                            <p>Extencion del archivo</p>
                            <p class="MEh">{{ $fileExtension }}</p>
                        </div>

                        <div class="datosimg">
                            <p>Tamaño del archivo</p>
                            <p class="MEh">{{ $fileSize }}</p>
                        </div>

                        <div class="datosimg">
                            <p>MimeType</p>
                            <p class="MEh">{{ $mimeType }}</p>
                        </div>
            
            </div>

        <img src='/bannersPublicidad/{{ $finalName }}' />

        @endisset
    </section>
</body>
</html>