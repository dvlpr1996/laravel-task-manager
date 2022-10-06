<?php

namespace App\Listeners;

use App\Events\changePassword;

class SendEmailChangePasswordNotification
{
	public function __construct()
	{
	}

	public function handle(changePassword $event)
	{
		if ($event->user->hasVerifiedEmail()) {
			$event->user->notify(new \App\Notifications\ChangePassword());
		}
	}
}
