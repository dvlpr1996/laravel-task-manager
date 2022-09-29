@forelse ($tomorrowTasks as $task)
		<x-single-task :task="$task"></x-single-task>
@empty
		<div class="rounded-lg bg-slate-700 p-5 text-center">
				<p>no task here yet for {{ Carbon\Carbon::tomorrow() }}!</p>
		</div>
@endforelse

{{ $tomorrowTasks->links('components.pagination') }}
