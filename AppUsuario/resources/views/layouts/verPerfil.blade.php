@extends('layouts.base')
@section('css')
  <link rel="stylesheet" href="{{ URL::asset('css/perfil.css') }}">
@endsection

@section('content')

<div class="contenedor">
    <div class="izquierda">
    </div>
    <div class="derecha">
      <div class="datos-usuario">
        <h3>Informacion</h3>
        <hr>

        <div class="info">

        <div id="nombreUsuario">

        </div>
          <div class="contenido-info">
            <h4>Correo:</h4>
          <p id="correo">{{ session()->get('nombreUsuario')}}</p>
          </div>

          <div id="datosUsuario">

          </div>

        </div>
      </div>
      <button class="btn">editar</button>
    </div>
</div>
@endsection
