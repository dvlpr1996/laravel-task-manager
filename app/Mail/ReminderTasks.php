<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReminderTasks extends Mailable
{
	use Queueable, SerializesModels;

	public $user;
	public $tasks;
	public function __construct($user,$tasks)
	{
		$this->user = $user;
		$this->tasks = $tasks;
	}

	public function build()
	{
		return $this->subject('Laravel task manager - reminder')->view('emails.reminder');
	}
}
