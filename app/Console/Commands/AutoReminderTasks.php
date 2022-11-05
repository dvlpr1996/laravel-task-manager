<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Mail\ReminderTasks;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoReminderTasks extends Command
{
	protected $signature = 'auto:AutoReminderTasks';
	protected $description = 'sending reminder email for users';

	public function handle()
	{
		$tasks = Task::select('name', 'user_id', 'reminder', 'status')->get();
		if ($tasks->count() > 0) {
			foreach ($tasks->unique('user_id') as $task) {
				Mail::to($task->user)->send(new ReminderTasks(
					$task->user,
					$task->user->tasks()->unDone()->where('reminder', 1)->get()
				));
			}
			$this->info('The command was successful!');
		}

		if ($tasks->count() <= 0)
			$this->error('Something went wrong!');

		return 0;
	}
}
