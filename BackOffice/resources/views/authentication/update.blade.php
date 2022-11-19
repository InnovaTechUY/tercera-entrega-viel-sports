@extends('layouts.base')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/registro.css');  }}">
@endsection

@section('content')
  <form class="formulario-registro" method="POST" action="{{route('usuario.update', $usuario->id)}}" >
  @csrf
    <h2>Editar usuario</h2>
        <label class="label" for="name">
        <input class="input @error('nombre') is-invalid @enderror" id="name" type="text" name="name" placeholder="Nombre" value="{{ $usuario->name }}" >
        </label>
        
        @error('name')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror

        <label class="label"  for="email">
        <input class="input " id="email" type="email" name="email" placeholder="Correo" value="{{ $usuario->email }}" >
        </label>
  
        @error('email')
            <small>
                <strong>{{ $message }}</strong>
            </small>
        @enderror
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

    @if ( session('auth') )
          <div class="alert alert-success" role="success">
            {{ session('auth')}}
          </div>
      @endif
      @if (!session('auth'))
          <div style="display:none;" class="alert alert-success" role="success">
            {{ session('auth') }}
          </div>
      @endif
    </form>
@endsection
 