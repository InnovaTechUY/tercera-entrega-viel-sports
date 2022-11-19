@extends('layouts.base')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/registro.css');  }}">
@endsection

@section('content')
  <form class="formulario-registro" method="POST" action="/registro" >
  @csrf
    <h2>Registro</h2>
        <label class="label" for="name">
        <input class="input @error('nombre') is-invalid @enderror" id="name" type="text" name="name" placeholder="Nombre" >
        </label>

        @error('name')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror

        <label class="label"  for="email">
        <input class="input " id="email" type="email" name="email" placeholder="Correo"  >
        </label>

        @error('email')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror
        <label class="label"  for="password">
        <input class="input" id="password" type="password" name="password" placeholder="Contraseña" >
        </label>

        @error('password')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror

        <label class="label"  for="password_confirmation">
        <input class="input" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmar Contraseña" >
        </label>

        @error('password_confirmation')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror

    <div class="contenedor-button-registro">
        <input class="button button-enviar" type="submit" value="Enviar">
        <input class="button button-borrar" type="reset" value="Borrar">
    </div>

    @isset($error)
        @isset($mensajeError["name"][0])
            <div class="alert alert-danger" role="success">{{ $mensajeError["name"][0] }} </div>
        @endisset
        @isset($mensajeError["email"][0])
            <div class="alert alert-danger" role="success">{{ $mensajeError["email"][0] }} </div>
        @endisset
        @isset($mensajeError["error"])
            <div class="alert alert-danger" role="success">{{ $mensajeError["error"] }} </div>
        @endisset
        @isset($mensajeError["password"][0])
            <div class="alert alert-danger" role="success">{{ $mensajeError["password"][0] }} </div>
        @endisset
        @isset($mensajeError["password_confirmation"][0])
            <div class="alert alert-danger" role="success">{{ $mensajeError["password_confirmation"][0] }} </div>
        @endisset
    @endisset

    </form>
@endsection
