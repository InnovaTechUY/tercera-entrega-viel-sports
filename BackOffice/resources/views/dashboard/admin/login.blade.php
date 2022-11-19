@extends('layouts.base')
    @section('css')
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                 <h4>Admin Login</h4><hr>
                 <form action="{{ route('admin.check') }}" method="post">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
    <div class="contenido-formulario-login">
      <label class="label"  for="email">
        <input class="input " id="email" type="email" name="email" placeholder="Correo"  >
        </label>
        <span class="text-danger">@error('email'){{ $message }}@enderror</span>

        <label class="label"  for="password">
        <input class="input" id="password" type="password" name="password" placeholder="Contraseña" >
        </label>
        <span class="text-danger">@error('password'){{ $message }}@enderror</span>

        <input class="button button-enviar" type="submit" value="Enviar">
      </div>
      
        </div>
      
      </div>
      </div>

    </form>
  </div>
            </div>
        </div>
    </div>
@endsection