<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreated extends Notification
{
    private $token;

    /**
     * Create a new notification instance.
     *
     * @param String $token
     */
    public function __construct(String $token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $appName = config('app.name');

        return (new MailMessage)
            ->from('pedrodalvy@outlook.com')
            ->subject("Sua conta no $appName foi criada")
            ->greeting("Olá {$notifiable->name}, seja bem vindo ao $appName")
            ->line("Sua matrícula é: {$notifiable->enrolment}")
            ->action('Clique aqui apra definir uma nova senha', route('password.reset', $this->token))
            ->line('Obrigado por usar nosso sistema!');
    }
}
