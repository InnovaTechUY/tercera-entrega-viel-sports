<?php

namespace App\Http\Controllers;

use App\Models\SuscripcionPaga;
use App\Models\Tarjeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;

class UserController extends Controller
{

    public function Create(Request $request)
    {

        $validation = $this->validateCreation($request);

        if ($validation !== "true") {
            return $validation;
        }

        try {
            return $this->createUser($request);

        } catch (QueryException $e) {
            return $this->handleCreateErrors($e);
        }

    }

    public function Authenticate(Request $request)
    {
        $validation = $this->validateAuthentication($request);

        if ($validation !== "true") {
            return $validation;
        }

        return $this->doAuthentication($request->only('email', 'password'));
    }

    public function datosUsuario($email)
    {

        $usuarioGratuito = DB::table('users')
            ->select('users.name', 'users.id')
            ->where('users.email', $email)
            ->get();

        $usuarioPago = DB::table('suscripcion')
            ->select('suscripcion.documento_identificador', 'suscripcion.fechaNacimiento', 'suscripcion.pais', 'suscripcion.telefono')
            ->where('suscripcion.idSuscripcion', $usuarioGratuito[0]->id)
            ->get();

        return ['usuario' => $usuarioGratuito, 'usuarioSuscripto' => $usuarioPago];

    }

    public function validateCreation($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }

        if ($request->post("password") !== $request->post("password_confirmation")) {
            return ["password" => "Las dos contraseñas no coinciden"];
        }

        return "true";
    }

    private function createUser($request)
    {
        $usuario = User::create([
            'name' => $request->post("name"),
            'email' => $request->post("email"),
            'password' => Hash::make($request->post("password")),
        ]);

    }

    private function handleCreateErrors($e)
    {
        return [
            "error" => 'Ya existe un usuario con ese email',
            "trace" => $e->getMessage(),
        ];
    }

    private function validateAuthentication($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }

        return "true";
    }

    private function doAuthentication($credentials)
    {
        if (Auth::attempt($credentials)) {
            return [
                'Status' => true,
                'Result' => "Sesión ingresada con éxito",
            ];
        }

        return [
            'Status' => false,
            'Result' => "Incorrecto, porfavor, vuelva a intentarlo.",
        ];

    }

    public function editUser($id)
    {
        $usuario = User::findOrFail($id);
        return view('authentication.update', compact('usuario'));
    }

    public function update(Request $request)
    {

        $validator = $this->validateCreation($request);

        if ($validator == "true") {
            $this->actualizar($request);
        }

        return redirect()->to('api/inicio');
        return $validator;
    }

    public function actualizar($request)
    {
        $usuarioActualizar = User::where('id', $request->id)
            ->update([
                'name' => $request->post("name"),
                'email' => $request->post("email"),
                'password' => Hash::make($request->post("password")),
            ]);
        return $usuarioActualizar;
    }

    public function getUser(Request $request)
    {
        $usuario = User::select('users.*')
            ->where('email', $request->email)
            ->get();
        return $usuario;
    }

    public function createSuscribePay(Request $request)
    {

        try {
            $id = DB::table('users')
                ->select('id')
                ->where('email', $request->post("email"))
                ->get();

            $idSuscripcion = $id[0]->id;

            $suscripcionPaga = new SuscripcionPaga();
            $suscripcionPaga->idSuscripcion = $idSuscripcion;
            $suscripcionPaga->documento_identificador = $request->post("documento_identificador");
            $suscripcionPaga->fechaNacimiento = $request->post("fechaNacimiento");
            $suscripcionPaga->telefono = $request->post("telefono");
            $suscripcionPaga->pais = $request->post("pais");
            $suscripcionPaga->save();

            $tarjeta = new Tarjeta();
            $tarjeta->codigo_verificador = $request->post("codigo_verificador");
            $tarjeta->numero_tarjeta = $request->post("numero_tarjeta");
            $tarjeta->idSuscripcion = $idSuscripcion;
            $tarjeta->save();

        } catch (QueryException $e) {
            return $this->handleCreateErrors($e);
        }

    }

}
