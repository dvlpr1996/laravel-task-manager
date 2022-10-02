<?php

namespace App\Listeners;

use App\Events\changePassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailChangePasswordNotification
{
	public function __construct()
	{
		
	}

	public function handle(changePassword $event)
	{
		if($event->user->hasVerifiedEmail()) {
			$event->user->sendEmailVerificationNotification();
		}
	}
}
