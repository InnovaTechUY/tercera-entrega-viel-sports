@extends('layouts.base')
@section('css')
  <link rel="stylesheet" href="{{ URL::asset('css/terminos.css') }}">
@endsection

@section('content')
  <div class="svg">
    <img src="{{ URL::asset('img/wave_declinado.svg') }}" alt="">
  </div>
  <div class="terminos__condiciones">
    <h2 class="nosotros__heading">Terminos y Condiciones</h2>
    <p class="nosotros__parrafo">
      1)Agente de Derechos de Autor. En el caso de que cualquier Usuario o un tercero considere que cualquiera de los Contenidos han sido introducido en el Portal con violación de sus derechos de propiedad intelectual deberá enviar una carta a la Empresa que contenga los siguientes elementos: (a) datos personales: nombre, dirección, número de teléfono y dirección de correo electrónico del reclamante; (b) forma auténtica o equivalente, con los datos personales del titular de los derechos de propiedad intelectual supuestamente infringidos o de la persona autorizada conforme a derecho para actuar en nombre y por cuenta del titular de los derechos de propiedad intelectual supuestamente infringidos; (c) indicación precisa y completa de los Contenidos protegidos mediante los derechos de propiedad intelectual supuestamente infringidos, así como de su localización en el Portal; (d) declaración expresa y clara de que la introducción de los Contenidos indicados se ha realizado sin el consentimiento del titular bajo la responsabilidad del reclamante de que la información proporcionada en la notificación es exacta y de que la introducción de los contenidos constituye una violación de sus derechos de propiedad intelectual. <br>
      2)Información del Usuario. En el curso del uso que usted haga del Sitio Web y/o de los servicios puestos a su disposición en o a través del Sitio Web, se le puede pedir que nos proporcione cierta información personalizada (dicha información en lo sucesivo "Información del Usuario"). Las políticas de uso y recopilación de información de Expansión con respecto a la privacidad de dicha Información del Usuario se establecen en la Política de Privacidad del Sitio Web, la cual está incorporada al mismo como referencia para todos los propósitos. Usted reconoce y acepta ser el único responsable de la exactitud del contenido de la Información del Usuario.
    </p>
  </div>
@endsection
