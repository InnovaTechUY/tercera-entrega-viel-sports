@extends('layouts.base')
  @section('css')
  <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
  @endsection

  @section('content')
    <form class="formulario-contacto" action="post">
      <h2>Contacto</h2>
      <div class="contenedor-formulario-contacto">
      <div class="formulario-contacto-contenido1">

          <label for="name" class="label">
            <input id="name" class="input" type="text" name="name" placeholder="Nombre" required>
          </label>

          <label for="familyname" class="label">
            <input id="familyname" class="input" type="text" name="familyname" placeholder="Apellido" required>
          </label>

          <label for="email" class="label">
            <input id="email" class="input" type="text" name="email" placeholder="Correo" required>
          </label>

      </div>
      <div>
        <textarea class="message" name="message" cols="30" rows="10" placeholder="ingrese su mensaje"></textarea>
      </div>
    </div>
    <div class="buttons-contenedor">
      <input class="button button-enviar" type="submit" value="Enviar">
      <input class="button button-borrar" type="reset" value="Borrar">
    </div>
    </form>
    @endsection
