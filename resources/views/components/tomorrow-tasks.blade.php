@forelse ($tomorrowTasks as $task)
		<x-single-task :task="$task"></x-single-task>
@empty
		<div class="box text-center">
				<p>no task here yet for {{ Carbon\Carbon::tomorrow()->toFormattedDateString() }}</p>
		</div>
@endforelse

{{ $tomorrowTasks->links('components.app.pagination') }}
