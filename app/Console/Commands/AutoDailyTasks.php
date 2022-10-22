<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Mail\DailyTask;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoDailyTasks extends Command
{
	protected $signature = 'auto:AutoDailyTasks';
	protected $description = 'sending email for user who today have tasks to do';

	public function handle()
	{
		$tasks = Task::select('name', 'user_id','due_date')->get();
		if ($tasks->count() > 0) {
			foreach ($tasks->unique('user_id') as $task) {
				Mail::to($task->user)->send(new DailyTask(
					$task->user,
					$task->user->tasks()->where('due_date', date('Y-m-d'))->unDone()->get()
				));
			}
			$this->info('The command was successful!');
		}

		if ($tasks->count() <= 0)
			$this->error('Something went wrong!');
			
		return 0;
	}
}
