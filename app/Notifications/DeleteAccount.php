<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeleteAccount extends Notification
{
	use Queueable;

	public function __construct()
	{
		//
	}

	public function via($notifiable)
	{
		return ['mail'];
	}

	public function toMail($notifiable)
	{
		return (new MailMessage)
			->greeting('Hi!')
			->line('Your account Successfully deleted')
			->line('Thank you for using Laravel task manager');
	}

	public function toArray($notifiable)
	{
		return [
			//
		];
	}
}
