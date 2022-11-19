<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Viel Sports</title>
  <link rel="icon" href="{{ URL::asset('img/icono.ico');  }}"> <!-- hay que cambiarlo por uno que se vea solo la V gigante -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/index.css');  }}">
  @yield('css')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/normalize.css');  }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/globales.css');  }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
  <header>
    <!--Navbar-->
    <nav class="navbar header">
      <div class="container-fluid">
        <a class="navbar-brand" href=""><img src="{{ URL::asset('img/Logo.png')}}"   alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Viel Sports</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">Inicio</a>
              </li> 

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">Idiomas</a>
                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                  <li><a class="dropdown-item" href="#">ES</a></li>
                  <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">EN</a></li>
            </ul>
            </li>
            </ul>

          </div>
        </div>
      </div>
    </nav>
  </header>


    @yield('content')

    <footer class="footer">
    <nav class="footer__nav">
      <a href="terminos.html">Terminos y Condiciones</a>
      <a href="nosotros.html">Sobre Nosotros</a>
      <a href="contacto.html">Contacto</a>
    </nav>
    <cite>Derechos Reservados</cite>
  </footer>
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
    <script src="{{ URL::asset('js/app.js') }}"></script>
</body>

</html>