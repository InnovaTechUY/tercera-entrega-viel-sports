<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Notificaciones;

class EmailController extends Controller
{
    public function EnviarMail(Request $request){
        $correo = [
            'para' => $request -> post('Para'),
            'asunto' => $request -> post('Asunto'),
            'contenido' => $request -> post('Mensaje')
        ];

        Mail::to($correo['para'])->send(new Notificaciones($correo));
        echo "Enviado";
    }
}
