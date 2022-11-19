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
              
              @auth
                @if(@Auth::user()->hasRole('admin'))
                <li class="nav-item">
                  <a class="nav-link" href="">Ver Usuarios</a>
                </li>
                @endif
              @endauth
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
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            @auth
            <div>
              <a class="logout" href="">  
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.51428 20H4.51428C3.40971 20 2.51428 19.1046 2.51428 18V6C2.51428 4.89543 3.40971 4 4.51428 4H8.51428V6H4.51428V18H8.51428V20Z"
                fill="currentColor"/>
                <path d="M13.8418 17.385L15.262 15.9768L11.3428 12.0242L20.4857 12.0242C21.038 12.0242 21.4857 11.5765 21.4857 11.0242C21.4857 10.4719 21.038 10.0242 20.4857 10.0242L11.3236 10.0242L15.304 6.0774L13.8958 4.6572L7.5049 10.9941L13.8418 17.385Z"
                fill="currentColor"/>
                </svg>
                Log Out
              </a>
            </div>
              
            @endauth
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