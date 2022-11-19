@extends('authentication.base')


@section('content')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/registro.css');  }}">
@endsection

<style>
    .formulario-registro{
        width: 95%;
    }   
    h1 {
        text-align: center;
    }
</style>
<h1>Resultados Deportivos</h1>
  <form class="formulario-registro" method="POST" action="{{ route('eventos.auth')}}" >
    @csrf
    <h2>Crear Evento</h2>

        
        <label class="label" for="evento">
        <input class="input" id="evento" type="text" name="evento" placeholder="Nombre Evento" >
        </label>

        <label class="label" for="lugar">
        <input class="input" id="lugar" type="text" name="lugar" placeholder="Nombre lugar" >
        </label>

        <label class="label" for="fecha">
        <input class="input" id="fecha" type="date" name="fecha" placeholder="fecha" >
        </label>

        <label class="label" for="horario">
        <input class="input " id="horario" type="time" min="12:00" max="00:00" name="horario" placeholder="horario" >
        </label>
        <!-- No funciona el time en firefox -->

        <select class="pais input" id="deporteEvento" name="deporte">
            <option value=""> -- Deportes --</option>
                @foreach ($deportes as $deporte)
                        <option value="{{$deporte->idDeporte}}"> {{$deporte->nombreDeporte}} </option>
                @endforeach
        </select>
  
    <div class="contenedor-button-registro">
        <input class="button button-enviar" type="submit" value="Enviar">
        <input class="button button-borrar" type="reset" value="Borrar">
    </div>

    </form>

    @isset($error)
        {{$$mensajeError}}

    @endisset

    <form class="formulario-registro" method="POST" action="{{ route('deportes.auth')}}" >
    @csrf
    <h2>Crear Deporte</h2>
        
        <label class="label" for="deporte">
        <input class="input" id="deporte" type="text" name="deporte" placeholder="Nombre Deporte" >
        </label>

        <!-- No funciona el time en firefox -->

        <select class="pais input" id="sistema" name="sistema">
            <option value=""> -- Sistema Puntaje --</option>
                @foreach ($sistemaPuntaje as $sistema)
                        <option value="{{$sistema->idSistema}}"> {{$sistema->sistema}} </option>
                @endforeach
        </select>

    <div class="contenedor-button-registro">
        <input class="button button-enviar" type="submit" value="Enviar">
        <input class="button button-borrar" type="reset" value="Borrar">
    </div> 

    </form>

    <form class="formulario-registro" method="POST" action="{{ route('equipos.auth')}}" >
        @csrf
        <h2>Crear Equipo</h2>
            
            <label class="label" for="equipo">
            <input class="input" id="equipo" type="text" name="equipo" placeholder="Nombre Equipo" >
            </label>
    
        <div class="contenedor-button-registro">
            <input class="button button-enviar" type="submit" value="Enviar">
            <input class="button button-borrar" type="reset" value="Borrar">
        </div> 

    </form>

    <form class="formulario-registro" method="POST" action="{{ route('jugadores.auth')}}" >
        @csrf
        <h2>Crear jugador</h2>
            
        <label class="label" for="jugador">
        <input class="input" id="jugador" type="text" name="nombreJugador" placeholder="Nombre jugador" >
        <label class="label" for="apellido">
        <input class="input" id="apellido" type="text" name="apellidoJugador" placeholder="Apellido jugador" >
        </label>
    
        <div class="contenedor-button-registro">
            <input class="button button-enviar" type="submit" value="Enviar">
            <input class="button button-borrar" type="reset" value="Borrar">
        </div> 
    </form>

    <form class="formulario-registro" method="POST" action="{{ route('jugadores.auth')}}" >
        @csrf
        <h2>Crear Director Tecnico</h2>
            
        <label class="label" for="jugador">
        <input class="input" id="jugador" type="text" name="nombreJugador" placeholder="Nombre jugador" >
        <label class="label" for="apellido">
        <input class="input" id="apellido" type="text" name="apellidoJugador" placeholder="Apellido jugador" >
        </label>
    
        <div class="contenedor-button-registro">
            <input class="button button-enviar" type="submit" value="Enviar">
            <input class="button button-borrar" type="reset" value="Borrar">
        </div> 
    </form>

    <form class="formulario-registro" method="POST" action="{{ route('resultado.auth')}}" >
        @csrf
        <h2>Crear Resultado</h2>

        <select class="pais input seccion" id="evento_resultado" name="evento">
            <option value=""> -- Seleccione Evento --</option>
            <option value="portanto ">deporte1</option>
            <option value="porset ">deporte2</option>
            <option value="pormarca">deporte3</option>
        </select>

            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Número set</th>
                    <th>Nombre local</th>
                    <th>Nombre visitante</th>
                    <th>Puntos local</th>
                    <th>Puntos visitante</th>
                    <th>Nuevo set</th>
                </tr>
                <tr id="set">
                    <td><input type="text" name="addMoreInputFields[0][nro_set]" placeholder="Nro set" class="form-control" /></td>
                    <td><input type="text" name="" placeholder="Equipo local" class="form-control" disabled/></td> 
                    <td><input type="text" name="addMoreInputFields[0][puntos_local]" placeholder="Puntos local" class="form-control" /></td>
                    <td><input type="text" name="" placeholder="Equipo visitante" class="form-control" disabled/></td>
                    <td><input type="text" name="addMoreInputFields[0][puntos_visitante]" placeholder="Puntos visitante" class="form-control" /></td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Nuevo set</button></td>
                </tr>
            </table>
            
            <table class="table table-bordered" id="dynamicAddRemove2">
                <tr>
                    <th>Equipo</th>
                    <th>Jugador</th>
                    <th>Marca</th>
                    <th>Nueva marca</th>
                </tr>
                <tr>
                    <td>
                    <select class="pais input" id="equipos" name="equipo">
                        <option value=""> -- Seleccione Equipo --</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{$equipo->idEquipo}}"> {{$equipo->nombreEquipo}} </option>
                        @endforeach
                    </select>
                    <td>
                    <select class="pais input" id="jugadores" name="equipoJugador">
                        <option value=""> -- Seleccione Jugador --</option>
                    </select>
                    </td>
                    </td>
                    <td><input type="text" name="addMoreInputFields[0][marca]" placeholder="Ingrese marca" class="form-control" /></td>
                    <td><button type="button" name="add" id="dynamic-ar2" class="btn btn-outline-primary">Añadir nueva marca</button></td>
                </tr>
            </table>

            <table class="table table-bordered" id="dynamicAddRemove3">
                <tr>
                    <th>Nombre local</th>
                    <th>Tanto local</th>
                    <th>Nombre visitante</th>
                    <th>Agregar tantos local y visitante</th>
                </tr>
                <tr>
                    <td><input type="text" name="" placeholder="Equipo local" class="form-control" disabled /></td>
                    <td><input type="text" name="addMoreInputFields[0][tanto_local]" placeholder="Ingrese tanto local" class="form-control" /></td>
                    <td><input type="text" name="" placeholder="Equipo Visitante" class="form-control" disabled /></td>
                    <td><input type="text" name="addMoreInputFields[0][tanto_visitante]" placeholder="Ingrese tanto visitante" class="form-control" /></td>
                    <td><button type="button" name="add" id="dynamic-ar3" class="btn btn-outline-primary">Añadir nueva marca</button></td>
                </tr>
            </table>
        </label>
        <div class="contenedor-button-registro">
            <input class="button button-enviar" type="submit" value="Enviar">
            <input class="button button-borrar" type="reset" value="Borrar">
        </div> 
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    var i = 0;

    $("#dynamic-ar").click(function () {

        ++i;
        $("#dynamicAddRemove")
            .append('<tr><td><input type="text" name="addMoreInputFields['+ i +'][nro_set]" placeholder="Nro set" class="form-control" /></td>'+
            '<td><input type="text" name="" placeholder="Equipo local" class="form-control" disabled /></td>'+
            '<td><input type="text" name="addMoreInputFields['+ i +'][puntos_local]" placeholder="Puntos local" class="form-control" /></td>'+
            '<td><input type="text" name="" placeholder="Equipo Visitante" class="form-control" disabled /></td>'+
            '<td><input type="text" name="addMoreInputFields['+ i +'][puntos_visitante]" placeholder="Puntos visitante" class="form-control" /></td>'+
            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            )

    });

    $("#dynamic-ar2").click(function () {
        ++i;
        $("#dynamicAddRemove2").append('<tr><td><select class="pais input" id="equipos" name="equipo"><option value=""> -- Seleccione Equipo --</option>@foreach ($equipos as $equipo)<option value="{{$equipo->idEquipo}}"> {{$equipo->nombreEquipo}} </option>@endforeach</select></td>'+
        '<td><select class="pais input" id="jugadores" name="equipoJugador"><option value=""> -- Seleccione Jugador --</option></select></td>'+
        '<td><input type="text" name="addMoreInputFields[' + i +'][marca]" placeholder="Ingrese marca" class="form-control" /></td>'+
        '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });

    $("#dynamic-ar3").click(function () {
        ++i;
        $("#dynamicAddRemove3").append('<tr><td><input type="text" name="" placeholder="Equipo local" class="form-control" disabled /></td>'+
        '<td><input type="text" name="addMoreInputFields['+i+'][tanto_local]" placeholder="Ingrese tanto local" class="form-control" /></td>'+
        '<td><input type="text" name="" placeholder="Equipo Visitante" class="form-control" disabled /></td>'+
        '<td><input type="text" name="addMoreInputFields['+i+'][tanto_visitante]" placeholder="tanto visitante" class="form-control" /></td>'+
        '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        
        );
    });

    $(function () {

    $('#equipos').on('change',ActualizarDatos);


    });

    async function ActualizarDatos() {

    var id = $(this).val();

    const archivo = `http://localhost:8004/api/resultados/${id}`;

    fetch(archivo)

    const resultado = await fetch(archivo);
    const datos = await resultado.json();

    console.log(datos.length);
    $('#jugadores').empty();
    $('#jugadores').append('<option value=""> -- Seleccione Jugador --</option>')
    datos.forEach(element => {
        var jugadores = $('#jugadores');
        jugadores.append(`<option value="${element.idJugador}"> ${element.nombreJugador} </option>`)
        
    });

    }

$("#evento_resultado").change(function () {

        $("#set > td > input, #set > td > button").prop("disabled", true);
    
    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection