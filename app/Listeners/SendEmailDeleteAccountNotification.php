<?php

namespace App\Listeners;

use App\Events\DeleteAccount;

class SendEmailDeleteAccountNotification
{
	public function __construct()
	{
		//
	}

	public function handle(DeleteAccount $event)
	{
		if ($event->user->hasVerifiedEmail()) {
			$event->user->notify(new \App\Notifications\DeleteAccount());
		}
	}
}
