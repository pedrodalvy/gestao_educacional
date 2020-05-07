<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreated extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ->line('Obrigado por usar nosso sistema!');
    }
}
