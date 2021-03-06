<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    use Queueable;

    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject('Restablecimiento de contraseña')
            ->line('Estimado/a '. $this->user . ',')
            ->line('Hemos recibido una solicitud para restablecer su contraseña. Haga clic en el siguiente enlace para cambiarla.')
            ->action('Restablecer Contraseña', url('password/reset', $this->token) . '?email=' . urlencode($notifiable->email))
            ->line('Si no solicitó restablecer la contraseña, haga caso omiso a este correo.')
            ->line('Cordial saludo,')
            ->line('Equipo EmPaz');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
