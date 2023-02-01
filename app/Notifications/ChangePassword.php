<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangePassword extends Notification
{
    use Queueable;

    public function __construct()
    {
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hi!')
            ->line('Your Password Successfully Changed')
            ->line('Thank you for using Laravel task manager');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
