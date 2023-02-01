<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyTask extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $tasks;

    public function __construct($user, $tasks)
    {
        $this->user = $user;
        $this->tasks = $tasks;
    }

    public function build()
    {
        return $this->subject('Laravel task manager - your tasks for '.Carbon::now()->toFormattedDateString())
            ->view('emails.dailyTask');
    }
}
