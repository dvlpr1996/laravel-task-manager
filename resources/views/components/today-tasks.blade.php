@forelse ($todayTasks as $task)
		<x-single-task :task="$task"></x-single-task>
@empty
		<div class="box text-center">
				<p>no task here yet for {{ Carbon\Carbon::now()->toFormattedDateString() }}</p>
		</div>
@endforelse

{{ $todayTasks->links('components.app.pagination') }}
