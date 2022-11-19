
@extends('layouts.base')
@section('css')
  <link rel="stylesheet" href="{{ URL::asset('css/suscripciones.css') }}">
@endsection

@section('content')
    <!--Iconos de Publicidad-->
    <div class="contenedor__iconos">
      <div class="contenido__iconos">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notification" width="60" height="60"
          viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <!--gráficos vectoriales escalables-->
          <path d="M10 6h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
          <circle cx="17" cy="7" r="3" />
        </svg>
        <div>
          <b>Recibe notificaciones <br>sobre tus deportes favoritos</b>
          <p>Tú los eliges</p>
        </div>
      </div>

      <div class="contenido__iconos">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="60"
          height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <!--gráficos vectoriales escalables-->
          <rect x="4" y="5" width="16" height="16" rx="2" />
          <line x1="16" y1="3" x2="16" y2="7" />
          <line x1="8" y1="3" x2="8" y2="7" />
          <line x1="4" y1="11" x2="20" y2="11" />
          <rect x="8" y="15" width="2" height="2" />
        </svg>
        <div>
          <b>Recordemos lo que pasó en <br>eventos pasados</b>
          <p>Cómo en tu mundial favorito</p>
        </div>
      </div>
      <div class="contenido__iconos">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
          stroke-width="2">
          <!--gráficos vectoriales escalables-->
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>
          <b>Suscribete</b>
          <p>Evita los anuncios aburridos</p>
        </div>
      </div>

      <div class="contenido__iconos">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="60" height="60"
          viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <!--gráficos vectoriales escalables-->
          <circle cx="12" cy="12" r="9" />
          <circle cx="12" cy="10" r="3" />
          <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
        </svg>
        <div>
          <b>Registrate</b>
          <p>Unete a nuestra comunidad</p>
        </div>
      </div>
    </div>
    <!--Suscripciones-->
    <div class="contenedor__suscripciones">
      <div class="contenido__suscripciones">
        <p class="suscripciones__duracion">Mensual</p>
        <div class="suscripcion">
          <div class="suscripciones__tipo">
            <h3>Individual</h3>
            <p class="suscripciones__precio"><span>$</span>4.99</p>
          </div>
          <p>- Evita los anuncios</p>
          <p>- Elige un deporte y enterate de las últimas noticias</p>
        </div>
        <a href="{{ route('suscribirse.index') }}" class="button button-auxiliar">Comenzar</a>
      </div>

      <div class="contenido__suscripciones">
        <p class="suscripciones__duracion">Anual</p>
        <div class="suscripcion">
          <div class="suscripciones__tipo">
            <h3>Individual</h3>
            <p class="suscripciones__precio"><span>$</span>13.99</p>
          </div>
          <p>- Evita los anuncios</p>
          <p>- Notificaciones personalizadas, elige más de un deporte</p>
        </div>
        <a href="{{ route('suscribirse.index') }}" class="button button-auxiliar">Comenzar</a>
      </div>
    </div>


  </main>
@endsection
