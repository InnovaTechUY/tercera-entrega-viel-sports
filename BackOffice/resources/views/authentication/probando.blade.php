<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<select class="pais input" id="equipos" name="equipo">
        <option value=""> -- Seleccione Equipo --</option>
            @foreach ($equipos as $equipo)
                    <option value="{{$equipo->idEquipo}}"> {{$equipo->nombreEquipo}} </option>
            @endforeach
</select>


<select class="pais input" id="jugadores" name="equipoJugador">

</select>

<div class="otroelemento">

</div>

<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

<script>

    
$(function () {

        $('#equipos').on('change',ActualizarDatos);

        
    });

    async function ActualizarDatos() {

        var id = $(this).val();

        const archivo = 'http://localhost:8004/api/coso/'+id+'/equipo';

        fetch(archivo)

        const resultado = await fetch(archivo);
        const datos = await resultado.json();

        console.log(datos.length);
 
        
        datos.forEach(element => {
            var jugadores = $('#jugadores');
            jugadores.append(`<option value="${element.idJugador}"> ${element.nombreJugador} </option>`)
            //jugadores.detach(`<option value="${element.idJugador}"> ${element.nombreJugador} </option>`)
            //jugadores.change();
            //jugadores.prepend
            
        }); 

        /* for(var i = 0; i < datos.length; i++)
        {
            var data = `<option value="${datos[i].idJugador}"> ${datos[i].nombreJugador} </option>`;
            $('#jugadores').append(data);
        } */

    }
</script>

</body>
</html>