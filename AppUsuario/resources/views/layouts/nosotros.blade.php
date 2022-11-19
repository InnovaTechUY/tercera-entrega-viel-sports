@extends('layouts.base')
  @section('css')
  <link rel="stylesheet" href="{{ URL::asset('css/nosotros.css') }}">
  @endsection

@section('content')
    <h3 class="titulo_nosotros">
      Sobre Nosotros
    </h3>

  <section>
    <div class="contenedor__arrow">
      <img id="arrow1" src="{{ URL::asset('img/arrow.svg') }}" class="arrow">
      <div style="display: none" id="contenido-arrow1" class="contenido-arrow"> <!-- javascript -->
        <div class="svg">
          <img src="{{ URL::asset('img/wave_inclinado.svg') }}" alt="">
        </div>
          <div  id="informacion1" class="nosotros__informacion">
              <h2 class="nosotros__heading">Sobre Nosotros</h2>
              <p class="nosotros__parrafo">Buscamos innovar, crear y desarrollar servicios, productos e ideas que ayuden a optimizar la actividad de nuestros clientes, en un ambiente cálido y diverso. Nos centramos en que las iniciativas pasen a ser movimientos, y en transformar lo sencillo en trascendental.
Mediante la implementación de sitios web nos proponemos llegar a todas las personas y que así logren gestionar de una forma excelente sus objetivos. Logrando una optimización de los recursos, su tiempo y su dinero.
</p>
          </div>
      </div>
    </div>

    <div class="contenedor__arrow">
      <img id="arrow2" src="{{ URL::asset('img/arrow.svg') }}" class="arrow">
      <div id="contenido-arrow2" style="display: none" class="nosotros__preguntas contenido-arrow">
          <h2>Preguntas Frecuentes</h2>

          <div class="contenedor__preguntas">

            <div class="preguntas__contenido">
              <h5 class="preguntas__heading">¿Dónde se encuentra ubicada la empresa?</h5>
              <p class="preguntas__parrafo">Contador Luis E. Lecueder 3536. Torre 1 World Trade Center.

              </p>
            </div>

            <div class="preguntas__contenido" >
              <h5 class="preguntas__heading">¿Cómo los puedo contactar?</h5>
              <p class="preguntas__parrafo">Nos pueden contactar a via innovatech1.uy@gmail.com
              </p>
            </div>

            <div class="preguntas__contenido" >
              <h5 class="preguntas__heading">¿Qué servicios ofrecen?</h5>
              <p class="preguntas__parrafo">Automatización de empresas, sitios web personalizados, desarrollo de software empresarial.
            </div>

            <div class="preguntas__contenido" >
              <h5 class="preguntas__heading">¿Cómo puedo recibir asesoramiento personalizado?</h5>
              <p class="preguntas__parrafo">Brindamos asesoramiento personalizado 24hrs a través de nuestro sitio web.
              </p>
            </div>

          </div>
      </div>
  </div>

  <div class="contenedor__arrow">
    <img id="arrow3" src="{{ URL::asset('img/arrow.svg') }}" class="arrow">
    <div id="contenido-arrow3" style="display: none" class="contenido-arrow">
      <div id="informacion3" class="nosotros__desarrolladores">
        <div class="desarrolladores__contacto">
          <h3>Desarrollado por <span>Innova-Tech</span></h3>
          <img src="{{ URL::asset('img/Logo-Desarrolladores.png')}}" alt="">
        </div>
        <div class="desarrolladores__informacion">
          <div class="informacion__desarrolladores">
            <h3>Misión</h3>
            <p>Desarrollar, comercializar, implementar, innovar y crear tecnología de última generación para optimizar los servicios de nuestros clientes y sus empresas. Asimismo, ofrecer la mejor experiencia y capacitación de nuestro equipo para apoyar su crecimiento personal.</p>
          </div>

          <div class="informacion__desarrolladores">
            <h3>Visión</h3>
            <p>Ser reconocidos a nivel regional como una empresa líder en el suministro de soluciones informáticas,
            comprometernos con los problemas de nuestros clientes de forma transparente, ágil y eficaz para convertirnos en su socio de confianza. </p>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
