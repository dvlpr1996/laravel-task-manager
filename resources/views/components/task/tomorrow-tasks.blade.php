@forelse ($tomorrowTasks as $task)
		<x-task.single-task :task="$task" />
@empty
		<div class="box text-center">
				<p>no task here yet for {{ Carbon\Carbon::tomorrow()->toFormattedDateString() }}</p>
		</div>
@endforelse

{{ $tomorrowTasks->links('components.app.pagination') }}
