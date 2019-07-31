<?php

namespace App\Listeners;

use App\Events\MensajeRecibido;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Mail;

class NotificarModeradores
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MensajeRecibido  $event
     * @return void
     */
    public function handle(MensajeRecibido $event)
    {
        // Buscar los usuarios con rol de "Moderador"
        $users = User::whereHas('roles', function ($q) {
            $q->where('nombre', 'Moderador');
        })->get();

        $mensaje = $event->getMensaje();

        // supuestamente enviar a cada Moderador un mensaje
        foreach ($users as $user) {
            $dataUsuario = $user->getAttributes();

            Mail::send('emails.notifica-moderador', ['msg' => $mensaje], function ($msg) use ($dataUsuario) {
                $msg->to($dataUsuario['email'], $dataUsuario['name'])->subject('Nuevo mensaje por revisar');
            });

            break;
        }
    }
}
