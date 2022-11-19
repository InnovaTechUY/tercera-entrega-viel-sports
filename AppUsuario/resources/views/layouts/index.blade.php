@extends('layouts.base')

@section('content')


<div class="wrp">
  <div class="portada"></div>
  <div class="contenido">
    <div class="info">
      <h1>Resultados Deportivos</h1>
      <a href="/resultados">Ver Resultados</a>
    </div>
  </div>
</div>
<main class="contenedor">
  <div class="contenedor__resultados__publicidad">
    @isset($error)
        <img src="http://localhost:8004/bannersPublicidad/{{ $banner[0]['URL']}}" />
    @endisset


    <div class="contenedor__resultados">
    <div class="contenido__resultados box-shadow transicion-tamaño" >
            <h4>Voleybol</h4>
            <div class="resultados__info">
                <h5>Superliga Femenina</h5>
                <div class="resultado">
                    <div class="equipo">
                        <p>Brasil</p>
                        <p class="puntaje">38</p>
                    </div>
                    <div class="equipo">
                        <p>Uruguay</p>
                        <p class="puntaje">50</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="contenido__resultados box-shadow transicion-tamaño" >
            <h4>Rugby</h4>
            <div class="resultados__info">
                <h5 style="margin-bottom: 1rem !important; ">Division de Honor</h5>
                <div class="resultado">
                    <div class="equipo">
                        <p>VRAC Entrepinares</p>
                        <p class="puntaje">28</p>
                    </div>

                    <div class="equipo">
                        <p>Olímpico RC</p>
                        <p class="puntaje">18</p>
                    </div>

                </div>

            </div>
        </div>

        <div class="contenido__resultados box-shadow transicion-tamaño">
            <h4>Ciclismo</h4>
            <div class="resultados__info">
                <h5>Giro di Lombardia</h5>
                <div class="resultado">
                    <div class="equipo">
                        <p>Tadej Pogacar</p>
                        <p class="puntaje">06:21:22</p>
                    </div>
                </div>

                <div class="resultado">
                    <div class="equipo">
                        <p>Enric Mas Nicolau</p>
                        <p class="puntaje">00:00:00</p>
                    </div>
                </div>

                <div class="resultado">
                    <div class="equipo">
                        <p>Mikel Landa Meana</p>
                        <p class="puntaje">00:00:10</p>
                    </div>
                </div>

                <div class="resultado">
                    <div class="equipo">
                        <p>Sergio Andrés Higuita García</p>
                        <p class="puntaje">00:00:52</p>
                    </div>
                </div>

                <div class="resultado">
                    <div class="equipo">
                        <p>Carlos Rodríguez</p>
                        <p class="puntaje">00:00:52</p>
                    </div>
                </div>


            </div>
        </div>

        <div class="contenido__resultados box-shadow transicion-tamaño">
            <h4>Handball</h4>
            <div class="resultados__info">
                <h5 style="margin-bottom: 1rem !important; ">Division de Honor</h5>
                <div class="resultado">
                    <div class="equipo">
                        <p>Netherlands W</p>
                        <p class="puntaje">28</p>
                    </div>

                    <div class="equipo">
                        <p>Germany W</p>
                        <p class="puntaje">36</p>
                    </div>

                </div>

            </div>
        </div>

        <div class="contenido__resultados box-shadow transicion-tamaño">
            <h4>Nombre Deporte Individual</h4>
            <div class="resultados__info">
                <p>Nombre Liga</p>
                <div class="resultado">
                    <div class="equipo">
                        <p>Racing</p>
                        <p class="puntaje">0</p>
                    </div>
                </div>

                <div class="resultado">
                    <div class="equipo">
                        <p>Racing</p>
                        <p class="puntaje">0</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contenido__resultados box-shadow transicion-tamaño">
            <h4>Nombre Deporte Equipos</h4>
            <div class="resultados__info">
                <p style="margin-bottom: 1rem !important; ">Nombre Liga</p>
                <div class="resultado">
                    <div class="equipo">
                        <p>Racing</p>
                        <p class="puntaje">0</p>
                    </div>

                    <div class="equipo">
                        <p>Racing</p>
                        <p class="puntaje">0</p>
                    </div>

                </div>

                <div class="resultado">
                    <div class="equipo">
                        <p>Racing</p>
                        <p class="puntaje">0</p>
                    </div>

                    <div class="equipo">
                        <p>Racing</p>
                        <p class="puntaje">0</p>
                    </div>

                </div>

                <div class="resultado">
                    <div class="equipo">
                        <p>Racing</p>
                        <p class="puntaje">0</p>
                    </div>

                    <div class="equipo">
                        <p>Racing</p>
                        <p class="puntaje">0</p>
                    </div>

                </div>
            </div>
        </div>

    </div>


    @isset($error)
       <img src="http://localhost:8004/bannersPublicidad/{{ $banner[1]['URL']}}" />
    @endisset

    </div>

  <div class="contenedor__slider">
    <div class="slider-3D">
      <span style="--i:1;"><img src="{{ URL::asset('img/pelota.png') }}" alt="pelota basketball"></span>
      <span style="--i:2;"><img src="{{ URL::asset('img/pelota2.png') }}" alt="pelota basketball"></span>
      <span style="--i:3;"><img src="{{ URL::asset('img/pelota3.png') }}" alt="pelota basketball"></span>
      <span style="--i:4;"><img src="{{ URL::asset('img/pelota4.png') }}" alt="pelota basketball"></span>
      <span style="--i:5;"><img src="{{ URL::asset('img/pelota5.png') }}" alt="pelota basketball"></span>
      <span style="--i:6;"><img src="{{ URL::asset('img/formula1.png') }}" alt="pelota basketball"></span>
      <span style="--i:7;"><img src="{{ URL::asset('img/ajedrez.png') }}" alt="pelota basketball"></span>
      <span style="--i:8;"><img src="{{ URL::asset('img/corredor.png') }}" alt="pelota basketball"></span>
    </div>
  </div>
  @endsection
