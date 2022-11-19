<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function CreateUser(Request $request)
    {

        $response = Http::post('http://localhost:8000/api/registro', [
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => $request->post('password'),
            'password_confirmation' => $request->post('password_confirmation'),
        ]);

        $autenticacion = json_decode($response, true);

        if (!$autenticacion) {
            return redirect("/inicio");
        }

        return view("layouts.registro", ['error' => true, 'mensajeError' => $autenticacion]);
    }

    public function AuthUser(Request $request)
    {

        $response = Http::post('http://localhost:8000/api/login', [
            'email' => $request->post('email'),
            'password' => $request->post('password'),
        ]);

        $autenticacion = json_decode($response, true);

        try {
            if ($autenticacion["Status"] == false) {
                return view("layouts.login", ['error' => true, 'mensajeError' => $autenticacion]);
            }

            $nombreUsuario = $request->post('email');
            $request->session()->put('autenticado', true);
            $request->session()->put('nombreUsuario', $nombreUsuario);
            return redirect("/inicio");

        } catch (\Throwable $th) {
            return view("layouts.login", ['error' => true, 'mensajeError' => $autenticacion]);

        }
    }

    public function LogoutUser(Request $request)
    {
        $request->session()->invalidate();
        return redirect("/inicio");
    }

    public function Banners()
    {
        $response = Http::get('http://localhost:8001/api/banners');

        $autenticacion = json_decode($response, true);
        if ($autenticacion == []) {
            return view('layouts.index');
        }

        return view('layouts.index', ['error' => true, 'banner' => $autenticacion]);
    }

    public function Suscripcion(Request $request)
    {

        $response = Http::post('http://localhost:8000/api/suscripcion', [
            'email' => $request->post('email'),
            'cedula' => $request->post('cedula'),
            'fechaNacimiento' => $request->post('fechaNacimiento'),
            'telefono' => $request->post('telefono'),
            'pais' => $request->post('pais'),
            'numero_tarjeta' => $request->post('numero_tarjeta'),
            'codigo_verificador' => $request->post('codigo_verificador'),
        ]);

        $autenticacion = json_decode($response, true);

        return $autenticacion;
    }

}
