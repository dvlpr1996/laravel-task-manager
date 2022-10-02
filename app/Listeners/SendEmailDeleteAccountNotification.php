<?php

namespace App\Listeners;

use App\Events\DeleteAccount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailDeleteAccountNotification
{
	public function __construct()
	{
		//
	}

	public function handle(DeleteAccount $event)
	{
		if ($event->user->hasVerifiedEmail()) {
			$event->user->sendEmailVerificationNotification();
		}
	}
}
