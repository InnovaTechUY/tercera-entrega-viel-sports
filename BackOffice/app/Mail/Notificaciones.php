<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notificaciones extends Mailable
{
    use Queueable, SerializesModels;

    public $Correo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contenido)
    {
        $this-> Correo = $contenido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this -> Correo['asunto'])
                    ->view('emails.notificaciones')->with("contenido",$this -> Correo['contenido']);
    }
}
